@extends('common.base')
@section('inbody')
    <script src="{{ asset('/js/predict.js') }}"></script>
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
                <label class="block-label">延遲<span id="show-offset-1"></span></label>
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
                <label class="block-label">延遲<span id="show-offset-2"></span></label>
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
