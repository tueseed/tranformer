<!DOCTYPE html>
    <html>
    <head>
        <title>Add Graphic to a Map Sample</title>
        <style type="text/css">
            body {
                overflow: hidden;
                font-family: sans-serif;
            }
            .page, .map {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
            }
            .active {
                background-color:  #FFD300 !important;
                color: black !important;
            }
            .btnAdd:hover {
                color: #FFD300;
            }
            .btnAdd {
                background-image: url('https://developer.nostramap.com/developer/V2/images/pin-trans.png');
                width: 90px;
                background-color: #222222;
                background-position: 0 0;
                border: none;
                color: #FFFFFF;
                padding: 5px 9px 6px;
                cursor: pointer;
                background-image: linear-gradient(rgba(255, 255, 255, 0.7) 0%, rgba(255, 255, 255, 0) 100%);
            }
            #show {
                right: 20px;
                top: 20px;
                background-color: #FFFFFF;
                border: 1px solid #2D2F37;
                border-radius: 3px;
                padding: 15px;
                position: fixed;
                width: 370px;
                vertical-align: middle;
                font-size: 14px;
            }
            #labelPanel {
                border: solid 1px #FFD300;
                padding: 5px
            }
            .lblRow {
                margin-left : 5px;
                margin-top: 3px;
            }
            .loadingWidget {
                position: absolute;
                width: 100%;
                height: 100%;
                background: White url('https://developer.nostramap.com/developer/V2/images/loader.gif') no-repeat fixed center center;
                filter: alpha(opacity=60);
                opacity: 0.6;
                z-index: 10000;
                vertical-align: middle;
                top: 0px;
                left: 0px;
            }
        </style>

        <script type="text/javascript" src="//api.nostramap.com/nostraapi/v2.0?key=G1qcnsy)nXzQqqEmi3Bd65aW8wxena7JcjVbuP6jhXfMEvXWB9hLJBrvLGaPMxmeDjRvCq)cKhsR699zlbQPLpW=====2"></script>

        <script type="text/javascript">
            var initExtent, map, point, lat, lon, pointLayer, mp;
            var currentType = "point";
            var points = [];
            var lstLabel = [];
            var isFirstLoad = true;

            nostra.onready = function () {
                initialize();
            };

            function initialize() {

                nostra.config.Language.setLanguage("L");
                map = new nostra.maps.Map("map", {
                    id: "mapTest",
                    logo: true,
                    scalebar: true,
                    basemap: "streetmap",
                    slider: true,
                    level: 18,
                    lat: 13.722944,
                    lon: 100.530449
                });

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
                map.events.click = function (evt) {
                    switch (currentType) {
                        case "point":
                            {
                                lat = evt.mapPoint.getLatitude();
                                lon = evt.mapPoint.getLongitude();
                                var nostraCallout = new nostra.maps.Callout({ title: "Test", content: "POI_NAME: Test ROAD:  Test" });
                                var nostraLabel = new nostra.maps.symbols.Label({
                                    text: document.getElementById("lblText").value,
                                    size: document.getElementById("lblSize").value,
                                    position: document.getElementById("lblPos").value,
                                    color: document.getElementById("lblColor").value,
                                    haloColor: document.getElementById("lblHaloColor").value,
                                    haloSize: document.getElementById("lblHaloSize").value,
                                    xoffset: document.getElementById("lblX").value,
                                    yoffset: document.getElementById("lblY").value
                                });
                                lstLabel.push(nostraLabel);
                                var pointMarker = new nostra.maps.symbols.Marker({ url: "", width: 60, height: 60, attributes: { POI_NAME: "TestAttr", POI_ROAD: "TestAttr" }, callout: nostraCallout, label: nostraLabel });
                                var g = pointLayer.addMarker(lat, lon, pointMarker);
                                if (document.getElementById("rdoHideLabel").checked) {
                                    setLavelVisible(false);
                                }
                                break;
                            }
                        case "circle":
                            {
                                lat = evt.mapPoint.getLatitude();
                                lon = evt.mapPoint.getLongitude();
                                var circle = new nostra.maps.symbols.Circle({ radius: 50, color: "#FF0000", outline: "#FF0000", transparent: 0.4 });
                                pointLayer.addCircle(lat, lon, circle);
                                break;
                            }
                        case "line":
                            {
                                lat = evt.mapPoint.getLatitude();
                                lon = evt.mapPoint.getLongitude();
                                points.push([lat, lon]);
                                var circle = new nostra.maps.symbols.Circle({ radius: 3, color: "#FF0000", outline: "#FF0000", transparent: 1 });
                                pointLayer.addCircle(lat, lon, circle);
                                break;
                            }
                        case "polygon":
                            {
                                lat = evt.mapPoint.getLatitude();
                                lon = evt.mapPoint.getLongitude();
                                points.push([lat, lon]);
                                var circle = new nostra.maps.symbols.Circle({ radius: 3, color: "#FF0000", outline: "#FF0000", transparent: 1 });
                                pointLayer.addCircle(lat, lon, circle);
                                break;
                            }
                        default:
                            break;
                    }
                };
                map.events.doubleClick = function (evt) {
                    lat = evt.mapPoint.getLatitude();
                    lon = evt.mapPoint.getLongitude();
                    var circle = new nostra.maps.symbols.Circle({ radius: 3, color: "#FF0000", outline: "#FF0000", transparent: 1 });
                    pointLayer.addCircle(lat, lon, circle);
                    points.push([lat, lon]);
                    switch (currentType) {
                        case "line":
                            {
                                var line = new nostra.maps.symbols.Line({ color: "#FF0000", width: 8, transparent: 0.4 });
                                pointLayer.addLine(points, line);
                                break;
                            }
                        case "polygon":
                            {
                                var polygon = new nostra.maps.symbols.Polygon({ color: "#FF0000", outline: "#FF0000", transparent: 0.4 });
                                pointLayer.addPolygon(points, polygon);
                                break;
                            }
                        default:
                            break;
                    }
                    points = [];
                };
                document.getElementById("rdoClick").onclick = function () {
                    pointLayer.setMouseOver(false); 
                };
                document.getElementById("rdoOver").onclick = function () {
                    pointLayer.setMouseOver(true);
                };
                document.getElementById("rdoShowLabel").onclick = function () {
                    setLavelVisible(true);
                };
                document.getElementById("rdoHideLabel").onclick = function () {
                    setLavelVisible(false);
                };
                document.getElementById("rdoShow").onclick = function () {
                    pointLayer.show();
                };
                document.getElementById("rdoHide").onclick = function () {
                    pointLayer.hide();
                };
            }
            function setLavelVisible(visible) {
                if (visible) {
                    for (var i = 0; i < lstLabel.length; i++) {
                        pointLayer.showLabel(lstLabel[i]);
                    }
                
                } else {
                    for (var i = 0; i < lstLabel.length; i++) {
                        pointLayer.hideLabel(lstLabel[i]);
                    }
                }
            }
            function addGraphic(type) {
                currentType = type; 

                document.getElementById("btnPoint").className = "btnAdd";
                document.getElementById("btnLine").className = "btnAdd";
                document.getElementById("btnPolygon").className = "btnAdd";
                document.getElementById("btnCircle").className = "btnAdd";
                document.getElementById("rdoPanel").style.display = "none";

                switch (type) {
                    case "point":
                        {
                            document.getElementById("labelPanel").style.display = "block";
                            document.getElementById("btnPoint").className += ' active';
                            document.getElementById("txtLabel").innerHTML = "Please click on the map to add point";
                            document.getElementById("rdoPanel").style.display = "inline-block";
                            break;
                        }
                    case "line":
                        {
                            document.getElementById("labelPanel").style.display = "none";
                            document.getElementById("btnLine").className += ' active';
                            document.getElementById("txtLabel").innerHTML = "Please click on the map to start point and double click to create line";
                            break;
                        }
                    case "polygon":
                        {
                            document.getElementById("labelPanel").style.display = "none";
                            document.getElementById("btnPolygon").className += ' active';
                            document.getElementById("txtLabel").innerHTML = "Please click on the map to start point and double click to create polygon";
                            break;
                        }
                    case "circle":
                        {
                            document.getElementById("labelPanel").style.display = "none";
                            document.getElementById("btnCircle").className += ' active';
                            document.getElementById("txtLabel").innerHTML = "Please click on the map to add circle";
                            break;
                        }
                    default:
                        break;
                }
            }
            function clearGraphic() {
                pointLayer.clear();
            }
            function showLoading() {
                document.getElementById("dlgLoading").style.display = "block";
            }
            function hideLoading() {
                document.getElementById("dlgLoading").style.display = "none";
            }
        </script>
    </head>
    <body class="tundra customClass">
        <div id="dlgLoading" class="loadingWidget">
        </div>
        <div id="map">
        </div>
        <div id="show">
            <div style="margin-bottom: 5px;">
                <button id="btnPoint" class="btnAdd active" onclick="addGraphic('point');">
                    AddPoint
                </button>
                <div id="rdoPanel" style="display: inline-block">
                    <label>Display Callout: </label>
                    <input id="rdoClick" style="margin: 5px;" type="radio" name="type" value="click" checked>Click</input>
                    <input id="rdoOver" style="margin: 5px;" type="radio" name="type" value="over">Mouse Hover</input>
                </div>
                <div id="labelPanel">
                    <div>
                        <label>Display Label: </label>
                        <input id="rdoShowLabel" style="margin: 5px;" type="radio" name="showLabel" value="show" checked>Show</input>
                        <input id="rdoHideLabel" style="margin: 5px;" type="radio" name="showLabel" value="hide">Hide</input>
                    </div>
                    <div class="lblRow">
                        <div style="width: 50px; display: inline-block;">Text</div>
                        <input id="lblText" type="text" style="width: 177px;" value="testLabel" />
                        <div style="margin-left: 30px;width: 25px;display: inline-block;">Size</div>
                        <input id="lblSize" type="text" style="width: 50px;" value="10" />
                    </div>
                    <div class="lblRow">
                        <div style="width: 50px; display: inline-block;">Color</div>
                        <input id="lblColor" type="text" style="width: 50px;" value="#353535" />
                        <div style="margin-left: 5px; width: 60px; display: inline-block; ">HaloColor</div>
                        <input id="lblHaloColor" type="text" style="width: 50px;" value="#ffffff" />
                        <div style="margin-left: 3px; width: 52px; display: inline-block; ">HaloSize</div>
                        <input id="lblHaloSize" type="text" style="width: 50px;" value="1" />
                    </div>
                    <div class="lblRow">
                        <div style="width:50px; display:inline-block;">Position</div>
                        <select id="lblPos" style="width: 70px;">
                            <option value="top" >Top</option>
                            <option value="bottom">Bottom</option>
                        </select>
                        <div style="margin-left: 2px; width: 47px; display: inline-block; ">X-offset</div>
                        <input id="lblX" type="text" style="width: 50px;" value="0"/>
                        <div style="margin-left: 5px; width: 50px; display: inline-block; ">Y-offset</div>
                        <input id="lblY" type="text" style="width: 50px;" value="0"/>
                    </div>
                </div>
            </div>
            <div>
                <button id="btnCircle" class="btnAdd" onclick="addGraphic('circle');">
                    AddCircle
                </button>
                <button id="btnLine" class="btnAdd" onclick="addGraphic('line');">
                    AddLine
                </button>
                <button id="btnPolygon" class="btnAdd" onclick="addGraphic('polygon');">
                    AddPolygon
                </button>
            </div>
            <div style="margin-top:10px;">
                <button id="btnClear" style="width:130px"  class="btnAdd" onclick="clearGraphic();">
                    Clear Graphic
                </button>
                <div id="rdoDisplay" style="display: inline-block">
                    <label>Display Graphic: </label>
                    <input id="rdoShow" style="margin: 5px;" type="radio" name="graphic" value="show" checked>Show</input>
                    <input id="rdoHide" style="margin: 5px;" type="radio" name="graphic" value="hide">Hide</input>
                </div>
            </div>
            <div style="margin-top:10px;" id="txtLabel">
                Please click on the map to add point
            </div>
        </div>
    </body>
    </html>