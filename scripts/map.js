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

    nostra.config.Language.setLanguage("L");
    map = new nostra.maps.Map("map", {
                                        id: "mapTest",
                                        logo: true,
                                        scalebar: true,
                                        basemap: "streetmap",
                                        slider: true,
                                        level: 13,
                                        lat: 13.690122,
                                        lon: 99.8490957
                                    }
                            );
    pointLayer = new nostra.maps.layers.GraphicsLayer(map, { id: "pointLayer", mouseOver: false });
    map.addLayer(pointLayer);
    get_point();
    

    /*map.events.click = function (evt) {
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
                                        
                                }*/
                                
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
        else if(load > 0 && load <50)
        {
            var icon = "./images/tr_success.png";
        }
        else if(load == 0)
        {
            var icon = "./images/tr_non.png";
        }
        lat = obj[i].lat;
        lon = obj[i].long;
        var nostraCallout = new nostra.maps.Callout({ title: obj[i].pea_no_tr, content: "สถานที่: <span id='test'></span>" + obj[i].location + "<br>เปอร์เซนต์โหลด: " + load.toFixed(2) + "%" });
        var nostraLabel = new nostra.maps.symbols.Label({
                                                            
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
                                                                                POI_NAME: obj[i].pea_no,
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

function test()
{
    $("#test").html("test");
    alert("test...");
    console.log(pointLayer);
    console.log(pointLayer.graphics[0].symbol.attributes.POI_NAME);
}

function test2()
{
    pointLayer.graphics[0].symbol.attributes.POI_NAME = "0000000";
    console.log(pointLayer.graphics[0].symbol.attributes.POI_NAME);
    var i =0;
    while(pointLayer.graphics[i])
    {
        console.log(pointLayer.graphics[i].symbol.attributes.POI_NAME);
        pointLayer.graphics[i].symbol.marker.url = './images/tr_danger.png';
        i++;
    }
}

function zm()
{
    map.zoomLevel(20);
    map.panTo(13.6251663230766,99.8483356079455)
    
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////FIRE BASE//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// var room_ref = firebase.database().ref(); 
// room_ref.on('value',function(snapshot){
//                                         document.getElementById("player_area").innerHTML = "";
//                                         var player_inroom = snapshot.val();
//                                         if(snapshot.val() == null)
//                                         {
//                                             sessionStorage.removeItem('room_id');
//                                             sessionStorage.removeItem('player_key');
//                                             sessionStorage.removeItem('status');
//                                             window.location.href="https://shake-battle.herokuapp.com/?code=return";
//                                         }
//                                         var i = 0;
//                                         while(Object.keys(player_inroom)[i])
//                                         {
//                                             var name = Object.values(player_inroom)[i].playername;
//                                             var score = Object.values(player_inroom)[i].score;
//                                             var picture = Object.values(player_inroom)[i].picture;
//                                             var player_status = Object.values(player_inroom)[i].status;
//                                             if(Object.keys(player_inroom)[i] !== "status"){
//                                             render_player(name,score,picture,Object.keys(player_inroom)[i],player_status);
//                                             console.log(Object.values(player_inroom)[i].playername);
//                                             }
//                                             i++;
//                                         }
// });
// The key of a root reference is null 



var room = firebase.database().ref('tr_load_log');
room.on('value',function(snapshot){
                                    console.log(snapshot.val());
                                  }
                                    );
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$( document).ready(function() {
    $('#txt_search').autocomplete({
        serviceUrl: './api/autocomplete_api.php',
        // onSelect: function (suggestion) {
        //     alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        //}
    })
  });


