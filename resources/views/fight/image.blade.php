@extends('common.base')
@section('inhead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('inbody')
    <link rel="stylesheet" href="{{ asset('/css/tagList.css') }}">
    <script src="{{ asset('/js/tagList.js') }}"></script>
    <script defer src="{{ asset('/js/fight-club.js') }}"></script>
    <script defer src="{{ asset('/js/dragnupload.js') }}"></script>
@endsection
@section('container')
    <div class="row">
    <div class="col-md-3">
        <article>
            <div id="holder" class="text-center">
                <h1>拉進來</h1>
                <h1>或直接貼上也行</h1>
            </div>
            <p id="upload" class="visible-xs-block"><label><input type="file"></label></p>
            <p id="filereader">File API & FileReader API not supported</p>
            <p id="formdata">XHR2's FormData is not supported</p>
            <p id="progress">XHR2's upload progress isn't supported</p>
            <p><progress id="uploadprogress" max="100" value="0">0</progress></p>
            <div class="col-md-12">
                <input id="uploaded-url" type="hidden" value="" class="form-control" />
            </div>
            <div class="col-md-12">
                <input id="tag-input" class="form-control" type="text" placeholder="請輸入標籤">
                <ul id="tag-list" class="tag-list"></ul>
                <button id="save" type="button" class="btn btn-primary btn-block" disabled>存檔</button>
            </div>
        </article>
    </div>
    <div id="result" class="col-md-9">
        <div class="row">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
                <input id="search-tags" type="text" class="form-control" id="exampleInputAmount" placeholder="搜尋標籤">
            </div>
            <hr>
        </div>
    </div>
    </div>
@endsection
