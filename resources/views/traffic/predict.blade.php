@extends('common.base')
@section('inbody')
    <script>
        var intervalId = [0, 0, 0];
        var start = function (id) {
                let year = (new Date).getFullYear(),
                    month = (new Date).getMonth() + 1,
                    day = (new Date).getDate(),
                    phaseBegin = Date.parse(year + '/' + month + '/' + day + ' 00:00:00') / 1000 + 1;
            intervalId[id] = setInterval(function () {
                let green = parseInt($('#green-' + id).val()),
                    red = parseInt($('#red-' + id).val()),
                    period = green + red,
                    offset = parseInt($('#offset-' + id).val()),
                    now = (new Date).getTime() / 1000,
                    phase = Math.floor((now - phaseBegin + offset) % period),
                    progress1 = $('#progress-' + id + '-1'),
                    progress2 = $('#progress-' + id + '-2'),
                    progress3 = $('#progress-' + id + '-3'),
                    progress4 = $('#progress-' + id + '-4'),
                    width1 = (phase <= green) ? phase : 0,
                    width2 = ((phase + red) <= period) ? red : (phase + red - period),
                    width3 = (phase <= green) ? (green - phase) : green,
                    width4 = ((phase + red) <= period) ? 0 : (period - phase),
                    countDown = (width4) ? period - width1 - width2 - width3 : period - width1 - width2;
                $('#offset-' + id).prop('min', - parseInt(period / 2));
                $('#offset-' + id).prop('max', parseInt(period / 2));
                $('#show-red-' + id).text(red);
                $('#show-green-' + id).text(green);
                $('#show-offset-' + id).text(offset);
                $('#countdown-' + id).text(countDown);
                progress1.css("width", Math.floor(width1 * 100 / period) + '%');
                progress2.css("width", Math.floor(width2 * 100 / period) + '%');
                progress3.css("width", Math.floor(width3 * 100 / period) + '%');
                progress4.css("width", Math.floor(width4 * 100 / period) + '%');
            }, 100);
        };
        var startOver = function (i) {
            let id = 0;
            if (typeof i === 'object') {
                id = $(this).data('id');
            } else {
                id = i;
            }
            if (intervalId[id]) {
                clearInterval(intervalId[id]);
            }
            start(id);
        };
        var toggleForm = function () {
            let id = $(this).data('id');
            $('#form-' + id).toggle();
            $('#location-input-' + id).text($('#location-' + id).val());
            $('#location-label-' + id).toggle();
        };
        $(document).on('change', '.period-control', startOver);
        $('.progress').on('click', toggleForm);
        $(document).ready(function () {
            start(1);
            start(2);
        });
    </script>
@endsection
@section('container')
    <div class="col-md-12" id="form-1">
        <div class="form-inline">
            <div class="form-group">
                <label>路口</label>
                <input type="text" class="form-control" id="location-1" data-id="1" placeholder="green" value="市民大道承德路路口">
            </div>
            <div class="form-group">
                <label>綠燈時間<span id="show-green-1"></span></label>
                <input type="range" class="form-control period-control" id="green-1" data-id="1" placeholder="green" value="75" max="200" min="0" step="1">
            </div>
            <div class="form-group">
                <label>紅燈時間<span id="show-red-1"></span></label>
                <input type="range" class="form-control period-control" id="red-1" data-id="1" placeholder="red" value="125" max="200" min="0" step="1">
            </div>
            <div class="form-group">
                <label>延遲<span id="show-offset-1"></span></label>
                <input type="range" class="form-control period-control" id="offset-1" data-id="1" placeholder="offset" value="0" max="200" min="-200" step="1">
            </div>
        </div>
    </div>
    <div class="col-xs-12" id="location-label-1" style="display: none;">
        <span id="location-input-1"></span>
    </div>
    <div class="row">
    <div class="col-xs-10">
        <div class="progress" data-id="1">
            <div id="progress-1-1" class="progress-bar progress-bar-success">
            </div>
            <div id="progress-1-2" class="progress-bar progress-bar-danger">
            </div>
            <div id="progress-1-3" class="progress-bar progress-bar-success">
            </div>
            <div id="progress-1-4" class="progress-bar progress-bar-danger">
            </div>
        </div>
    </div>
    <div class="col-xs-2">
        <span id="countdown-1"></span>
    </div>
    </div>
    <div class="col-md-12" id="form-2">
        <div class="form-inline">
            <div class="form-group">
                <label>路口</label>
                <input type="text" class="form-control" id="location-2" data-id="1" placeholder="green" value="市民大道中山北路路口">
            </div>
            <div class="form-group">
                <label>綠燈時間<span id="show-green-2"></span></label>
                <input type="range" class="form-control period-control" id="green-2" data-id="2" placeholder="green" value="65" max="200" min="0" step="1">
            </div>
            <div class="form-group">
                <label>紅燈時間<span id="show-red-2"></span></label>
                <input type="range" class="form-control period-control" id="red-2" data-id="2" placeholder="red" value="115" max="200" min="0" step="1">
            </div>
            <div class="form-group">
                <label>延遲<span id="show-offset-2"></span></label>
                <input type="range" class="form-control period-control" id="offset-2" data-id="2" placeholder="offset" value="0" max="200" min="-200" step="1">
            </div>
        </div>
    </div>
    <div class="col-xs-12" id="location-label-2" style="display: none;">
        <span id="location-input-2"></span>
    </div>
    <div class="row">
    <div class="col-xs-10">
        <div class="progress" data-id="2">
            <div id="progress-2-1" class="progress-bar progress-bar-success">
            </div>
            <div id="progress-2-2" class="progress-bar progress-bar-danger">
            </div>
            <div id="progress-2-3" class="progress-bar progress-bar-success">
            </div>
            <div id="progress-2-4" class="progress-bar progress-bar-danger">
            </div>
        </div>
    </div>
    <div class="col-xs-2">
        <span id="countdown-2"></span>
    </div>
    </div>
@endsection
