@extends('common.base')
@section('inhead')
    <script src="{{ asset('/js/app.js') }}"></script>
    <link href="{{ asset('/css/c3.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script src="{{ asset('/js/c3.min.js') }}"></script>
@endsection
@section('container')
    <h1>駕照數量分析圖</h1>
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
    axis: {
        x: {
            type: "timeseries",
            tick: {
                fit: true,
                format: "%Y"
            }
        }
    },
    tooltip: {
        format: {
            title: function (year) {
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
$.get('/api/diagrams', function (data) {
    chart.load(data);
    chart.hide(data.hide);
    chart.groups(data.groups);
});

    </script>
@endsection
