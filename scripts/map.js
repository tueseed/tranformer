    var map;
    var data = "https://developer.nostramap.com/developer/asset/data/dataTestCluster.json";
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
                                                                            success: function (results)
                                                                             {
                                                                                var markerClusterer = new nostra.maps.symbols.MarkerClusterer({        
                                attributeToSetSum: "revenue",
                                data:
                                [
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_Rev_lt10.png",
                                        width: 60,
                                        height: 60,
                                        range: 1
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_Rev_10-50.png",
                                        width: 70,
                                        height: 70,
                                        range: 10000000
                                    },
                                    {
                                        url: "https://developer.nostramap.com/developer/asset/image/iconCluster/Sum_Rev_50up.png",
                                        width: 80,
                                        height: 80,
                                        range: 50000000
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