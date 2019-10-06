$(function () {


    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'api/queries/get-general-bar-chard-data',
        success: function (data) {
            console.log(data);
            prepareDashboard1(data)
        },
        error: function () {
            console.log(data);
        }
    });


    function prepareDashboard1(data) {
        Highcharts.chart('graphic-container1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Satisfaction rate'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Punctuation'
                }
            },
            yAxis: {
                title: {
                    text: 'Numbers of agents'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Agents",
                    colorByPoint: true,
                    data: [
                        {
                            name: "1",
                            y: data[0]['1']
                        },
                        {
                            name: "2",
                            y: data[1]['2']
                        },
                        {
                            name: "3",
                            y: data[2]['3']
                        },
                        {
                            name: "4",
                            y: data[3]['4']
                        },
                        {
                            name: "5",
                            y: data[4]['5']
                        }
                    ]
                }
            ]
        });
    }

    function prepareDashboard2() {
        Highcharts.chart('graphic-container2', {

            chart: {
                scrollablePlotArea: {
                    minWidth: 700
                }
            },

            data: {
                csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
                beforeParse: function (csv) {
                    return csv.replace(/\n\n/g, '\n');
                }
            },

            title: {
                text: 'Daily sessions at www.highcharts.com'
            },

            subtitle: {
                text: 'Source: Google Analytics'
            },

            xAxis: {
                tickInterval: 7 * 24 * 3600 * 1000, // one week
                tickWidth: 0,
                gridLineWidth: 1,
                labels: {
                    align: 'left',
                    x: 3,
                    y: -3
                }
            },

            yAxis: [{ // left y axis
                title: {
                    text: null
                },
                labels: {
                    align: 'left',
                    x: 3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }, { // right y axis
                linkedTo: 0,
                gridLineWidth: 0,
                opposite: true,
                title: {
                    text: null
                },
                labels: {
                    align: 'right',
                    x: -3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }],

            legend: {
                align: 'left',
                verticalAlign: 'top',
                borderWidth: 0
            },

            tooltip: {
                shared: true,
                crosshairs: true
            },

            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function (e) {
                                hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: e.pageX || e.clientX,
                                        y: e.pageY || e.clientY
                                    },
                                    headingText: this.series.name,
                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                        this.y + ' sessions',
                                    width: 200
                                });
                            }
                        }
                    },
                    marker: {
                        lineWidth: 1
                    }
                }
            },

            series: [{
                name: 'All sessions',
                lineWidth: 4,
                marker: {
                    radius: 4
                }
            }, {
                name: 'New users'
            }]
        });

    }

    function prepareDashboard3() {
        var date1 = new Date(2019, 10, 6, 5, 30, 25);
        var date2 = new Date(2019, 10, 6, 6, 30, 25);
        var date3 = new Date(2019, 10, 6, 7, 30, 25);
        var date4 = new Date(2019, 10, 6, 7, 50, 25);

        var transactions = [
            [date1.getTime(), 4.5],
            [date2.getTime(), 3],
            [date3.getTime(), 5],
            [date4.getTime(), 2]
        ];


        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        Highcharts.chart('graphic-container3', {

            title: {
                text: 'Transactions for Agent'
            },

            xAxis: {
                type: 'datetime'
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true
            },

            legend: {},

            series: [{
                name: 'Punctuations',
                data: transactions,
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[0]
                }
            }]
        });
    }

});