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
    legend: {
        position: 'right'
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
