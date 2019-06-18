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
                                        lat: 13.722944,
                                        lon: 100.530449
                                    }
                            );
    pointLayer = new nostra.maps.layers.GraphicsLayer(map, { id: "pointLayer", mouseOver: false });
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
                                                                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_4.png", 
                                                                                        width: 20,
                                                                                        height: 20, 
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

}

function get_point()
{


}