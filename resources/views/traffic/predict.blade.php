@extends('common.base')
@section('inhead')
    <script>
        var intervalId = [0, 0, 0];
        var start = function (id) {
            let green = parseInt($('#green-' + id).val()),
                red = parseInt($('#red-' + id).val()),
                offset = parseInt($('#offset-' + id).val());
                year = (new Date).getFullYear(),
                month = (new Date).getMonth() + 1,
                day = (new Date).getDate(),
                phaseBegin = Date.parse(year + '/' + month + '/' + day + ' 00:00:00') / 1000 - offset;
            intervalId[id] = setInterval(function () {
                let period = green + red;
                let now = (new Date).getTime() / 1000;
                let phase = Math.floor((now - phaseBegin) % period);
                let progress1 = $('#progress-' + id + '-1');
                let progress2 = $('#progress-' + id + '-2');
                let progress3 = $('#progress-' + id + '-3');
                let progress4 = $('#progress-' + id + '-4');
                let width1 = (phase <= green) ? phase : 0;
                let width2 = ((phase + red) <= period) ? red : (phase + red - period);
                let width3 = (phase <= green) ? (green - phase) : green;
                let width4 = ((phase + red) <= period) ? 0 : (period - phase);
                let countDown = width4 ? width4 : width3;
                $('#countdown-' + id).text(countDown);
                progress1.css("width", Math.floor(width1 * 100 / period) + '%');
                progress2.css("width", Math.floor(width2 * 100 / period) + '%');
                progress3.css("width", Math.floor(width3 * 100 / period) + '%');
                progress4.css("width", Math.floor(width4 * 100 / period) + '%');
            }, 1000);
        };
        var startOver = function () {
            let id = $(this).data('id');
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
        $(document).on('click', '.start-cal', startOver);
        $(document).on('change', '.period-control', startOver);
        $(document).on('click', '.progress', toggleForm);
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
                <label>綠燈時間</label>
                <input type="number" class="form-control period-control" id="green-1" data-id="1" placeholder="green" value="20">
            </div>
            <div class="form-group">
                <label>紅燈時間</label>
                <input type="number" class="form-control period-control" id="red-1" data-id="1" placeholder="red" value="130">
            </div>
            <div class="form-group">
                <label>延遲</label>
                <input type="number" class="form-control period-control" id="offset-1" data-id="1" placeholder="offset" value="0">
            </div>
            <button class="btn btn-primary start-cal" data-id="1" type="button">開始計時</button>
        </div>
    </div>
    <div class="col-xs-12" id="location-label-1" style="display: none;">
        <span id="location-input-1"></span>
    </div>
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
    <div class="col-md-12" id="form-2">
        <div class="form-inline">
            <div class="form-group">
                <label>路口</label>
                <input type="text" class="form-control" id="location-2" data-id="1" placeholder="green" value="市民大道承德路路口">
            </div>
            <div class="form-group">
                <label>綠燈時間</label>
                <input type="number" class="form-control period-control" id="green-2" data-id="2" placeholder="green" value="20">
            </div>
            <div class="form-group">
                <label>紅燈時間</label>
                <input type="number" class="form-control period-control" id="red-2" data-id="2" placeholder="red" value="130">
            </div>
            <div class="form-group">
                <label>延遲</label>
                <input type="number" class="form-control period-control" id="offset-2" data-id="2" placeholder="offset" value="0">
            </div>
            <button class="btn btn-primary start-cal" data-id="2" type="button">開始計時</button>
        </div>
    </div>
    <div class="col-xs-12" id="location-label-2" style="display: none;">
        <span id="location-input-2"></span>
    </div>
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
@endsection
