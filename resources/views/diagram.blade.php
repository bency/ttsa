@extends('common.base')
@section('inhead')
    <script src="{{ asset('/js/app.js') }}"></script>
    <link href="{{ asset('/css/c3.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script src="{{ asset('/js/c3.min.js') }}"></script>
@endsection
@section('container')
    <h1>各種交通統計數據</h1>
    <section id="everything">
    </section>
    <script>
var chart = c3.generate({
    bindto: '#everything',
    data: {
        x: 'axis',
        xFormat: '%Y',
        columns: []
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
            max: 300000
        }
    },
    tooltip: {
        format: {
            title: function (year) {
                if (year.getFullYear() == '2007') {
                    return '2007 重機開放進口';
                }
                if (year.getFullYear() == '2012') {
                    return '2012 開放紅黃牌上高架';
                }
                return year.getFullYear();
            }
        }
    }
});
$.get('/api/diagrams', function (data) {
    chart.load(data);
});

    </script>
@endsection
