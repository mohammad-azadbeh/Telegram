$(document).ready(function () {

    var colors = Highcharts.getOptions().colors,
        categories = ['مرد', 'زن'],
        data = [{
            y: 50,
            color: colors[0],
            drilldown: {
                name: 'مرد',
                categories: ['بین 20 تا 30 سال', 'بین 30 تا 40 سال', 'بین 40 تا 50 سال', 'بین 50 تا 60 سال', 'بین 60 ات 70 سال', 'بین 70 تا 80 سال'],
                data: [10, 20, 30, 30, 5, 5],
                color: colors[0]
            }
        }, {
            y: 50,
            color: colors[1],
            drilldown: {
                name: 'زن',
                categories: ['بین 20 تا 30 سال', 'بین 30 تا 40 سال', 'بین 40 تا 50 سال', 'بین 50 تا 60 سال', 'بین 60 ات 70 سال', 'بین 70 تا 80 سال'],
                data: [30, 20, 30, 10, 5, 5],
                color: colors[1]
            }
        }],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    $('#chart1').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'میزان مشارکت بیماران زن / مرد'
        },
        subtitle: {
            text: 'بر اساس گروه سنی های مختلف'
        },
        yAxis: {
            title: {
                text: 'درصد مشارکت'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        series: [{
            name: 'Browsers',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: '#ffffff',
                distance: -30
            }
        }, {
            name: 'جنسیت',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
                formatter: function () {
                    // display only if larger than 1
                    return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%' : null;
                }
            }
        }]
    });


    // Guage

    var gaugeOptions = {

        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    $('#container-speed').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 200,
            title: {
                text: 'میزان بهبودی بیماران'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'میزان بهبودی بیماران',
            data: [80],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                '<span style="font-size:12px;color:silver">درصد %</span></div>'
            },
            tooltip: {
                valueSuffix: ' درصد'
            }
        }]

    }));

    // The RPM gauge
    $('#container-rpm').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 5,
            title: {
                text: 'میزان مشارکت بیماران'
            }
        },

        series: [{
            name: 'میزان مشارکت بیماران',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                '<span style="font-size:12px;color:silver">درصد</span></div>'
            },
            tooltip: {
                valueSuffix: ' درصد '
            }
        }]

    }));

    // The RPM gauge
    $('#gauge-2').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'درصد انجام آزمایشات'
            }
        },

        series: [{
            name: 'درصد انجام آزمایشات',
            data: [78],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y:.1f}</span><br/>' +
                '<span style="font-size:12px;color:silver">درصد %</span></div>'
            },
            tooltip: {
                valueSuffix: ' درصد'
            }
        }]

    }));


    $('#chart2').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'روند بهبود بیماران بر اساس جنسیت در ماه گذشته در بازه های سه روز'
        },
        subtitle: {
            text: 'تحت نظر دستگاههای آریا طب'
        },
        xAxis: {
            categories: ['اول', 'دوم', 'سوم', 'چهارم', 'پنجم', 'ششم', 'هفتم', 'هشتم', 'نهم', 'دهم', ]
        },
        yAxis: {
            title: {
                text: 'درصد'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'مرد',
            data: [30.0, 50.4, 20.5, 85.5, 12.5, 19.6, 43.5, 12,9, 64.4,75,6]
        }, {
            name: 'زن',
            data: [15.0, 60.4, 50.5, 90.5, 35.5, 45.6, 65.5, 35, 55.4,65,6]
        }]
    });


});