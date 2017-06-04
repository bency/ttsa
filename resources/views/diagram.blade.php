@extends('common.base')
@section('inhead')
    <script src="{{ asset('/js/app.js') }}"></script>
    <link href="{{ asset('/css/c3.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script src="{{ asset('/js/c3.min.js') }}"></script>
@endsection
@section('container')
    <h1>駕照數量與機動車輛數分析圖</h1>
    <section id="everything">
    </section>
    <h1>各車種涉入事故比例</h1>
    <a class="pull-right" href="http://talas-pub.iot.gov.tw/MainQuery.aspx" target="_blank">來源 <span class="glyphicon glyphicon-share"></span></a>
    <section id="accident"></section>
    <h1> 2016 A1類道路交通事故率－按車種分</h1>
    <section id="a1accident"></section>
    <script>
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
            max: 2,
            label: "件/每萬輛"
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

    </script>
@endsection
