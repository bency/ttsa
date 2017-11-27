@extends('common.base')
@section('inbody')
    <link rel="stylesheet" href="{{ asset('/css/tagList.css') }}">
    <script src="{{ asset('/js/tagList.js') }}"></script>
    <script src="{{ asset('/js/fight-club.js') }}"></script>
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
                <input id="uploaded-url" type="text" value="" class="form-control" />
            </div>
            <div class="col-md-12">
                <p>請輸入標籤</p>
                <ul id="tag-list" class="tag-list">
                    <li><input id="tag-input" class="tag-list-input" type="text" /></li>
                </ul>
            </div>
        </article>
    </div>
    <div class="col-md-9">
    </div>
    </div>
@endsection
