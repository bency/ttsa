var chart = c3.generate({
    bindto: '#everything',
    size: {
        height: 800
    },
    data: {
        xFormat: '%Y',
        columns: []
    },
    zoom: {
        enabled: true,
        rescale: true
    },
    grid: {
        x: {
            lines: [
                {value: '2002', text: '開放 250cc 以上進口', position: 'middle'},
                {value: '2007', text: '開放 550cc 以上上高架'},
                {value: '2012', text: '開放 250cc 以上上高架'}
            ]
        }
    },
    subchart: {
        show: true,
        size: {
            height: 200,
        }
    },
    axis: {
        x: {
            type: "timeseries",
            tick: {
                fit: true,
                format: "%Y"
            }
        },
        y2: {
            show: true,
            label: '駕照數量',
            tick: {
                format: d3.format("s")
            }
        },
        y: {
            label: '機動車輛數',
            tick: {
                format: d3.format("s")
            }
        }
    }
});

var accidentChart = c3.generate({
    bindto: '#accident',
    size: {
        height: 1000
    },
    legend: {
        show: false,
    },
    data: {
        columns: [
        ],
        order: 'desc',
        color: function (color, d) {
            if (typeof d.id === 'undefined') {
                return color;
            }
            color = d3.rgb('#133a92');
            if (d.index < 24) {
                color = d3.rgb('#79c71b');
            }
            if (d.index < 21) {
                color = d3.rgb('#e22b2b');
            }
            if (d.index < 19) {
                color = d3.rgb('#783894');
            }
            if (d.index < 14) {
                color = d3.rgb('#387894');
            }
            var darker = d.id % 3 / 3;
            return d3.rgb(color).darker(darker);
        }
    },
    axis: {
        rotated: true,
        x: {
            type: 'category'
        },
        y: {
            max: 2,
            label: "每萬輛涉及人數"
        }
    },
    grid: {
        y: {
            show: true
        }
    },
    zoom: {
        enabled: true,
        rescale: true
    }
});
var a1accidentChart = c3.generate({
    bindto: '#a1accident',
    data: {
        order: 'desc',
        columns: [],
    },
    grid: {
        y: {
            show: true
        },
        y: {
            lines: [
                {value: 155.2, axis: 'y2', text: '重型機車事故涉入 件/萬輛', position: 'middle'},
                {value: 70.94, axis: 'y2', text: '自用小客車事故涉入 件/萬輛', position: 'middle'},
                {value: 10.85, axis: 'y2', text: '輕型機車事故涉入 件/萬輛', position: 'middle'},
            ]
        }
    },
    size: {
        height: 1000
    },
    axis: {
        x: {
            type: 'category'
        },
        y: {
            label: "肇事/事故/死亡率 件/萬輛",
        },
        y2: {
            show: true,
            label: "事故涉入率 件/萬輛",
        }
    },
});
$.get('/api/accident-a1', function (data) {
    a1accidentChart.load(data);
    a1accidentChart.hide(data.hide);
    //a1accidentChart.groups(data.groups);
});
$.get('/api/accident-ratio', function (data) {
    accidentChart.load(data);
    accidentChart.unload(data.hide);
    accidentChart.groups(data.groups);
});
$.get('/api/driverlicenses', function (data) {
    chart.load(data);
    chart.hide(data.hide);
    chart.groups(data.groups);
});

$.get('/api/vehicles', function (data) {
    chart.load(data);
    chart.hide(data.hide);
});
