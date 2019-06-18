var initExtent, map, point, lat, lon, pointLayer, mp;
            var currentType = "point";
            var points = [];
            var lstLabel = [];
            var isFirstLoad = true;

            nostra.onready = function () {
                initialize();
            };


function initialize() 
{

    map = new nostra.maps.Map("map", {
                                        id: "mapTest",
                                        logo: true,
                                        scalebar: true,
                                        basemap: "streetmap",
                                        slider: true,
                                        level: 18,
                                        lat: 13.690122,
                                        lon: 99.8490957
                                    }
                            );
    pointLayer = new nostra.maps.layers.GraphicsLayer(map, { id: "pointLayer", mouseOver: true });
    map.addLayer(pointLayer);
    
    map.events.load = function () {
                                        isFirstLoad = false;
                                        map.disableDoubleClickZoom();
                                        hideLoading();
                                    };
    map.events.layerAddComplete = function () {
                                                if (!isFirstLoad) {
                                                    hideLoading();
                                                }
                                             };

    function showLoading() {
                                document.getElementById("dlgLoading").style.display = "block";
                            }
    function hideLoading() {
                                document.getElementById("dlgLoading").style.display = "none";
                            }

    map.events.click = function (evt) {
                                        lat = evt.mapPoint.getLatitude();
                                        lon = evt.mapPoint.getLongitude();
                                        var nostraCallout = new nostra.maps.Callout({ title: "Test", content: "POI_NAME: Test ROAD:  Test" });
                                        var nostraLabel = new nostra.maps.symbols.Label({
                                            text: "123456",
                                            size: "10",
                                            position: "Top",
                                            color: "#353535",
                                            haloColor: "#ffffff".value,
                                            haloSize: "1",
                                            xoffset: "0",
                                            yoffset: "0"
                                        });
                                        lstLabel.push(nostraLabel);
                                        var pointMarker = new nostra.maps.symbols.Marker(
                                                                                            { 
                                                                                                url: "./images/tr_danger.png", 
                                                                                                width: 40,
                                                                                                height: 40, 
                                                                                                attributes: { 
                                                                                                                POI_NAME: "TestAttr",
                                                                                                                POI_ROAD: "TestAttr" 
                                                                                                            },
                                                                                                callout: nostraCallout,
                                                                                                label: nostraLabel 
                                                                                            }
                                                                                        );
                                        var g = pointLayer.addMarker(lat, lon, pointMarker);
                                        
                                }
                                get_point();
}

function get_point()
{
    $.ajax({
                url: './api/map_api.php',
                method: 'POST',
                async: true,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    var obj = JSON.parse(response) || {};
                    console.log("call point success");
                    plt_point(obj);
                },	
            });

}

function plt_point(obj)
{
    console.log("plt_point..");
    var i=0;
    while(obj[i])
    {
        var rate_amp = ((obj[i].kva * 1000)/(1.732 * 400))*3;
        var total_amp = parseInt(obj[i].t_a) + parseInt(obj[i].t_b) + parseInt(obj[i].t_c);
        var avg_amp = total_amp/3
        var load = (total_amp/rate_amp)*100;
        
        if(load > 80)
        {
            var icon = "./images/tr_danger.png";
        }
        else if(load > 50 && load <80)
        {
            var icon = "./images/tr_warning.png";
        }
        else if(load < 50)
        {
            var icon = "./images/tr_success.png";
        }
        lat = obj[i].lat;
        lon = obj[i].long;
        var nostraCallout = new nostra.maps.Callout({ title: "Test", content: "POI_NAME: Test ROAD:  Test" });
        var nostraLabel = new nostra.maps.symbols.Label({
                                                            text: obj[i].pea_no,
                                                            size: "10",
                                                            position: "Top",
                                                            color: "#353535",
                                                            haloColor: "#ffffff".value,
                                                            haloSize: "1",
                                                            xoffset: "0",
                                                            yoffset: "0"
                                                        });
        lstLabel.push(nostraLabel);
        var pointMarker = new nostra.maps.symbols.Marker(
                                                            { 
                                                                url: icon, 
                                                                width: 40,
                                                                height: 40, 
                                                                attributes: { 
                                                                                POI_NAME: "TestAttr",
                                                                                POI_ROAD: "TestAttr" 
                                                                            },
                                                                callout: nostraCallout,
                                                                label: nostraLabel 
                                                            }
                                                        );
        var g = pointLayer.addMarker(lat, lon, pointMarker);
        i++;
    }
}