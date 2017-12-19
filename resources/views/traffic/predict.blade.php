@extends('common.base')
@section('container')
    <div id="intersect">
        <div v-for="intersec in intersecions" class="col-md-12" id="form-1">
            <div class="form-inline">
                <div class="form-group">
                    <label class="block-label">路口</label>
                    <input class="form-control" id="location-1" data-id="1" placeholder="green" v-model="intersec.name">
                </div>
                <div class="form-group">
                    <label class="block-label">綠燈時間<span id="show-green-1">@{{ intersec.green }}</span></label>
                    <input v-model="intersec.green" v-on:change="changeSetting(intersec.id, 'green')" type="range" class="form-control period-control" v-bind:id="'green-' + intersec.id" placeholder="green" max="200" min="0" step="1">
                </div>
                <div class="form-group">
                    <label class="block-label">紅燈時間<span id="show-red-1">@{{ intersec.red }}</span></label>
                    <input v-model="intersec.red" v-on:change="changeSetting(intersec.id, 'red')" type="range" class="form-control period-control" v-bind:id="'red-' + intersec.id" placeholder="red" max="200" min="0" step="1">
                </div>
                <div class="form-group">
                    <label class="block-label">延遲<span id="show-offset-1">@{{ intersec.offset }}</span></label>
                    <input v-model="intersec.offset" v-on:change="changeSetting(intersec.id, 'offset')" type="range" class="form-control period-control" v-bind:id="'offset-' + intersec.id" placeholder="offset" max="200" min="-200" step="1">
                </div>
            </div>
            <div class="col-xs-12" id="location-label-1" style="display: none;">
                <span>@{{ intersec.name }}</span>
            </div>
            <div class="row">
                <div class="col-xs-10">
                    <div class="progress" data-id="1">
                        <div v-bind:style="{width: intersec.width[0] + '%'}" class="progress-bar progress-bar-success"></div>
                        <div v-bind:style="{width: intersec.width[1] + '%'}" class="progress-bar progress-bar-danger"></div>
                        <div v-bind:style="{width: intersec.width[2] + '%'}" class="progress-bar progress-bar-success"></div>
                        <div v-bind:style="{width: intersec.width[3] + '%'}" class="progress-bar progress-bar-danger"></div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <span>@{{ intersec.countDown }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
