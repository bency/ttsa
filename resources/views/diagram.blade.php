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
    axis: {
        x: {
            type: "timeseries",
            tick: {
                fit: true,
                format: "%Y"
            }
        },
        y: {
            tick: {
                format: d3.format("s")
            }
        }
    },
    tooltip: {
        format: {
            title: function (year) {
                if (year.getFullYear() == '2002') {
                    return '2002 開放 250cc 以上進口';
                }
                if (year.getFullYear() == '2007') {
                    return '2007 開放紅牌上高架';
                }
                if (year.getFullYear() == '2012') {
                    return '2012 開放黃牌上高架';
                }
                return year.getFullYear();
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
