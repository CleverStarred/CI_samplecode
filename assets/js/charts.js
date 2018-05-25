//== Class definition
var amChartsChartsDemo = function() {

    //== Private functions
    var demo1 = function() {
        var chart = AmCharts.makeChart("m_amcharts_1", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "dataDateFormat": "YYYY-MM",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": false,
                "axisColor": "#ffffff",
                "fillColor": "#ffffff",
                "gridColor": "#ffffff",
                "color": "white"
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0,
            },
            "graphs": [{
                "id": "g1",
                "balloon": {
                    "drop": true,
                    "adjustBorderColor": false,
                    "color": "#black"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#fff",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "red line",
                "useLineColorForBulletBorder": false,
                "valueField": "value",
                "lineColor": "#FFFFFF",
                "negativeLineColor": "#FFFFFF",
                "balloonText": "<span style='font-size:18px; color:#000;'>[[value]]</span>"
            }],
            
            "chartCursor": {
                "pan": false,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 1,
                "cursorColor": "#000",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
            },
            
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "gridColor": "#ffffff",
                "fillColor": "#ffffff",
                "minorGridEnabled": true,
                "color": "#FFFFFF",
                "axisColor": "#ffffff",
            },
            "dataProvider": [{
                "date": "2017-01",
                "value": 21,
                "labelColor": "#fff"
            }, {
                "date": "2017-02",
                "value": 35
            }, {
                "date": "2017-03",
                "value": 26
            }, {
                "date": "2017-04",
                "value": 18
            }, {
                "date": "2017-05",
                "value": 13
            }, {
                "date": "2017-06",
                "value": 22
            }, {
                "date": "2017-07",
                "value": 23
            }, {
                "date": "2017-08",
                "value": 35
            }, {
                "date": "2017-09",
                "value": 43
            }, {
                "date": "2017-10",
                "value": 57
            }, {
                "date": "2017-11",
                "value": 49
            }, {
                "date": "2017-12",
                "value": 56
            }, {
                "date": "2018-01",
                "value": 72
            }]
        });
    }


    var demo2 = function() {
        var chart = AmCharts.makeChart("m_amcharts_2", {
            "type": "serial",
            "dataProvider": [{
                "date": "2017.01",
                "visits": 2025
            }, {
                "date": "2017.02",
                "visits": 1882
            }, {
                "date": "2017.03",
                "visits": 1809
            }, {
                "date": "2017.04",
                "visits": 1322
            }, {
                "date": "2017.05",
                "visits": 1122
            }, {
                "date": "2017.06",
                "visits": 1114
            }, {
                "date": "2017.07",
                "visits": 984
            }, {
                "date": "2017.08",
                "visits": 711
            }, {
                "date": "2017.09",
                "visits": 665
            }, {
                "date": "2017.10",
                "visits": 580
            }, {
                "date": "2017.11",
                "visits": 443
            }, {
                "date": "2017.12",
                "visits": 441
            }, {
                "date": "2018.01",
                "visits": 395
            }],
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0,
                "color": "white",
                "axisColor": "#ffffff"
            }],
            "gridAboveGraphs": false,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 1,
                "lineAlpha": 0,
                "type": "column",
                "valueField": "visits",
                "graphsColorField": "color",
                "columnColor": "#FFFFFF",
                "fillColors": "#FFFFFF"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "date",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20,
                "gridColor": "#ffffff",
                "fillColor": "#ffffff",
                "minorGridEnabled": true,
                "color": "#FFFFFF",
                "axisColor": "#ffffff",
            }

        });
    }

    var demo3 = function() {
        var chart = AmCharts.makeChart("m_amcharts_3", {
            "type": "pie",
            "theme": "light",
            "autoMargins": false,
            "marginRight": 0,
            "marginLeft": 0,
            "marginTop": 0,
            "marginBottom":0,
            "pullOutRadius": 0,
            "dataProvider": [{
                "country": "omani",
                "litres": omani_count
            }, {
                "country": "Expat",
                "litres": expat_count
            }],
            "valueField": "litres",
            "titleField": "country",
            "balloon": {
                "fixedPosition": true
            },
            "export": {
                "enabled": false
            }
        });
    }

    var demo4 = function() {
        var chart = AmCharts.makeChart("m_amcharts_4", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "dataDateFormat": "YYYY-MM",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": false,
                "axisColor": "#ffffff",
                "fillColor": "#ffffff",
                "gridColor": "#ffffff",
                "color": "white"
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0,
            },
            "graphs": [{
                "id": "g1",
                "balloon": {
                    "drop": true,
                    "adjustBorderColor": false,
                    "color": "#black"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#fff",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "red line",
                "useLineColorForBulletBorder": false,
                "valueField": "value",
                "lineColor": "#FFFFFF",
                "negativeLineColor": "#FFFFFF",
                "balloonText": "<span style='font-size:18px; color:#000;'>[[value]]</span>"
            }],
            
            "chartCursor": {
                "pan": false,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 1,
                "cursorColor": "#000",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
            },
            
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "gridColor": "#ffffff",
                "fillColor": "#ffffff",
                "minorGridEnabled": true,
                "color": "#FFFFFF",
                "axisColor": "#ffffff",
            },
             "dataProvider": [{
                "date": "2017-01",
                "value": 53
            }, {
                "date": "2017-02",
                "value": 56
            }, {
                "date": "2017-03",
                "value": 54
            }, {
                "date": "2017-04",
                "value": 50
            }, {
                "date": "2017-05",
                "value": 52
            }, {
                "date": "2017-06",
                "value": 57
            }, {
                "date": "2017-07",
                "value": 60
            }, {
                "date": "2017-08",
                "value": 67
            }, {
                "date": "2017-09",
                "value": 73
            }, {
                "date": "2017-10",
                "value": 80
            }, {
                "date": "2017-11",
                "value": 76
            }, {
                "date": "2017-12",
                "value": 86
            }, {
                "date": "2018-01",
                "value": 90
            }]
        });

        chart.addListener("rendered", zoomChart);

        // zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
        }
    };
}();

jQuery(document).ready(function() {
    amChartsChartsDemo.init();
});