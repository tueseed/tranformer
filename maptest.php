<!DOCTYPE html>
    <html>
    <head>
        <title>Marker Clustering by Count Sample</title>
        <style type="text/css">
            body {
                font-family: sans-serif;
                font-size: 12px;
            }
            #map {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
            #div-block-panel {
                right: 20px;
                top: 20px;
                background-color: #FFFFFF;
                border: 1px solid #2D2F37;
                border-radius: 3px;
                padding: 15px;
                position: fixed;
                width: 350px;
                vertical-align: middle;
                font-size: 14px;
                z-index: 1000;
            }
            .loadingWidget {
                position: absolute;
                width: 100%;
                height: 100%;
                background: White url('//api.nostramap.com/developer/content/asset/images/loader.gif') no-repeat fixed center center;
                filter: alpha(opacity=60);
                opacity: 0.6;
                z-index: 99;
                vertical-align: middle;
                top: 0px;
                left: 0px;
            }
        </style>
        <script type="text/javascript" src="//api.nostramap.com/nostraapi/v2.0?key=G1qcnsy)nXzQqqEmi3Bd65aW8wxena7JcjVbuP6jhXfMEvXWB9hLJBrvLGaPMxmeDjRvCq)cKhsR699zlbQPLpW=====2"></script>
        <script type="text/javascript">
            var map;
            var data = "./api/map_api.php";

            nostra.onready = function () {
                nostra.config.Language.setLanguage(nostra.language.E);
                initialize();
            };
            function initialize() {
                showLoading();
                map = new nostra.maps.Map("map", {
                    id: "mapSample",
                    level: 6,
                    lat: 12.8161643,
                    lon: 101.5500735,
                    country: "TH"
                });
                map.events.load = function () {
                    jQuery.ajax({
                        url: data,
                        jsonp: "callback",
                        dataType: "json",
                        contentType: "application/json",
                        success: function (results) {
                            var markerClusterer = new nostra.maps.symbols.MarkerClusterer({
                                data:
                                [
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_1-10.png",
                                        range: 1
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_11-99.png",
                                        width: 50,
                                        height: 50,
                                        range: 10
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_99up.png",
                                        width: 60,
                                        height: 60,
                                        range: 100
                                    }
                                ]
                            });
                            var markerPin = new nostra.maps.symbols.MarkerPin({
                                attributeToSetType: "rating",
                                data:
                                [
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_4.png",
                                        type: "4",
                                        width: 34,
                                        height: 42
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_4.5.png",
                                        type: "4.5",
                                        width: 34,
                                        height: 42
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_5.png",
                                        type: "5",
                                        width: 34,
                                        height: 42
                                    }
                                ]
                            });
                            var cluster = new nostra.maps.MarkerClustering({
                                "map": map,
                                "data": results,
                                "callout": {
                                    "width": 300,
                                    "height": 150
                                },
                                "markerClusterer": markerClusterer,
                                "markerPin": markerPin
                            });
                            hideLoading();
                        },
                        error: function (response) {
                            console.log("error", response);
                            hideLoading();
                        }
                    });
                };
            }
            function showLoading() {
                document.getElementById("dlgLoading").style.display = "block";
            }
            function hideLoading() {
                document.getElementById("dlgLoading").style.display = "none";
            }
        </script>
    </head>
    <body>
        <div id="dlgLoading" class="loadingWidget"></div>
        <div id="map"></div>
        <div id="div-block-panel">
            <p style="font-size:20px; font-weight:bold;">Display combination number on a cluster symbol</p><hr /><br />
            This sample shows the position of hotels with 4-5 star rating on the map. The cluster symbol has the following meaning:
            <table>
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_1-10.png" height="30" width="30"></td>
            <td> : Combination number is between 0-10</td>
                </tr>
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_11-99.png" height="30" width="30"></td>
            <td> : Combination number is between 11-99</td>
                </tr>
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_pin_99up.png" height="30" width="30"></td>
            <td> : Combination number is greater than 99</td>
                </tr>
            </table>
            <table style="padding-top:10px;">
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_4.png" height="38" width="30"></td>
            <td> : Position of hotels with 4 star rating</td>
                </tr>
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_4.5.png" height="38" width="30"></td>
            <td> : Position of hotels with 4.5 star rating</td>
                </tr>
            <tr>
            <td><img src="https://developer.nostramap.com/developer/asset/image/iconCluster/ratting_5.png" height="38" width="30"></td>
            <td> : Position of hotels with 5 star rating</td>
                </tr>
            </table>
            <br />
            <div style="padding-top:10px; text-align:center;">
                <a href="/live/jsSample/clusterBySum.html">How to display sum of value on a cluster symbol</a>
            </div>
        </div>
    </body>
    </html>