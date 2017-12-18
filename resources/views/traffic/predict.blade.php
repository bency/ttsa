@extends('common.base')
@section('container')
    <div id="intersect">
        <div v-for="intersec in intersecions" class="col-md-12" id="form-1">
            <div class="form-inline">
                <div class="form-group">
                    <label>路口</label>
                    <input class="form-control" id="location-1" data-id="1" placeholder="green" v-model="intersec.name">
                </div>
                <div class="form-group">
                    <label>綠燈時間<span id="show-green-1">@{{ intersec.green }}</span></label>
                    <input v-model="intersec.green" v-on:change="changeGreen" type="range" class="form-control period-control" v-bind:id="'green-' + intersec.id" placeholder="green" max="200" min="0" step="1">
                </div>
                <div class="form-group">
                    <label>紅燈時間<span id="show-red-1">@{{ intersec.red }}</span></label>
                    <input v-model="intersec.red" type="range" class="form-control period-control" v-bind:id="'red-' + intersec.id" placeholder="red" max="200" min="0" step="1">
                </div>
                <div class="form-group">
                    <label class="block-label">延遲<span id="show-offset-1">@{{ intersec.offset }}</span></label>
                    <input v-model="intersec.offset" type="range" class="form-control period-control" v-bind:id="'offset-' + intersec.id" placeholder="offset" max="200" min="-200" step="1">
                </div>
            </div>
            <div class="col-xs-12" id="location-label-1" style="display: none;">
                <span id="location-input-1"></span>
            </div>
            <div class="row">
                <div class="col-xs-10">
                    <div class="progress" data-id="1">
                        <div class="progress-bar progress-bar-success"></div>
                        <div class="progress-bar progress-bar-danger"></div>
                        <div class="progress-bar progress-bar-success"></div>
                        <div class="progress-bar progress-bar-danger"></div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <span id="countdown-1"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
