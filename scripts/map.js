var initExtent, map, point, lat, lon, pointLayer,tr_non_layer, mp;
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
                                        level: 12,
                                        lat: 13.7283757945257,
                                        lon: 99.7690354331662
                                    }
                            );
    pointLayer = new nostra.maps.layers.GraphicsLayer(map, { id: "pointLayer", mouseOver: false });
    tr_non_layer = new nostra.maps.layers.GraphicsLayer(map, { id: "tr_non_layer", mouseOver: false });
    map.addLayer(tr_non_layer);
    map.addLayer(pointLayer);
    get_point();
    map.events.zoom = function(evt)
    {
        var lavel = map.getLevel();
        console.log(map.getLevel());

        if(lavel > 15 )
        {
            setLavelVisible(true);
        }
        else if(lavel < 16)
        {
            setLavelVisible(false);
        }
    }
    

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
    document.getElementById("has_log").onclick = function () {
                                                                var x = document.getElementById("has_log").checked;
                                                                if(x == true)
                                                                {
                                                                    pointLayer.show();
                                                                }
                                                                else if(x == false)
                                                                {
                                                                    pointLayer.hide();
                                                                }
                                                            };
    document.getElementById("no_log").onclick = function () {
                                                                var x = document.getElementById("no_log").checked;
                                                                if(x == true)
                                                                {
                                                                    tr_non_layer.show();
                                                                }
                                                                else if(x == false)
                                                                {
                                                                    tr_non_layer.hide();
                                                                }
                                                            };                          
}

function setLavelVisible(visible) 
{
    console.log("setlavel");
    if (visible) {
        for (var i = 0; i < lstLabel.length; i++) {
            pointLayer.showLabel(lstLabel[i]);
            tr_non_layer.showLabel(lstLabel[i]);
        }
    
    } else {
        for (var i = 0; i < lstLabel.length; i++) {
            pointLayer.hideLabel(lstLabel[i]);
            tr_non_layer.hideLabel(lstLabel[i]);
        }
    }
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
                complete:function(){setLavelVisible(false);}	
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
        var unb_per = ((obj[i].max_amp-avg_amp)*100)/avg_amp;
        if(load > 80)
        {
            if(unb_per > 20){ var icon = "./images/tr_danger_u.png";}else{var icon = "./images/tr_danger.png";}
        }
        else if(load > 50 && load <80)
        {
            if(unb_per > 20){var icon = "./images/tr_warning_u.png";}else{var icon = "./images/tr_warning.png";}  
        }
        else if(load > 0 && load <50)
        {
            if(unb_per >20){var icon = "./images/tr_success_u.png";}else{var icon = "./images/tr_success.png";}     
        }
        else if(load == 0)
        {
            var icon = "./images/tr_non.PNG";
        }
        lat = obj[i].lat;
        lon = obj[i].lon;
        var nostraCallout = new nostra.maps.Callout({ title: obj[i].pea_no_tr, content: "<b>สถานที่:</b> " + obj[i].location + "<br><b>เปอร์เซนต์โหลด:</b> " + load.toFixed(2) + "%<br><b>กระแส:</b><br>เฟส A: "+ obj[i].t_a +" A.<br>เฟส B: " + obj[i].t_b + " A.<br>เฟส C: " +obj[i].t_c+ " A.<br><b>เปอร์เซนต์ Unbalance :</b>" + unb_per.toFixed(2) + "%"});
        var nostraLabel = new nostra.maps.symbols.Label({
                                                            text:obj[i].pea_no_tr,
                                                            size: "8",
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
                                                                                POI_NAME: obj[i].pea_no_tr,
                                                                                POI_ROAD: "TestAttr" 
                                                                            },
                                                                callout: nostraCallout,
                                                                label: nostraLabel 
                                                            }
                                                        );
        if(load == 0)
        {
            //var g = pointLayer.addMarker(lat, lon, pointMarker);
            tr_non_layer.addMarker(lat, lon, pointMarker);
        }
        else if(load > 0)
        {
            pointLayer.addMarker(lat, lon, pointMarker);
        }
        i++;
    }
}



function zm(lat,lon)
{
     map.zoomLevel(20);
     //map.panTo(13.756088571784,99.8132173044767)
     map.panTo(lat,lon)
    console.log(lat,lon);
    
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



 
    $("#txt_search").autocomplete(
                                        {
                                            //    source: get_autocom()
                                             serviceUrl: './api/autocomplete_api.php',
                                             minChars:3,
                                             onSelect: function (suggestion) {
                                            map.zoomLevel(5);
                                             zm(suggestion.data.lat,suggestion.data.lon);
                                             
                                            }
                                        
                                        }
                                    );
  




