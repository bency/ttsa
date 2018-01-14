@extends('common.base')
@section('inbody')
    <script async src="{{ asset('/js/dragnupload.js') }}"></script>
@endsection
@section('container')
    <form action="{{route('report.store')}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">報導時間</label>
            <input id="reported_at" type="date" name="reported_at" class="form-control" value="{{ old('reported_at') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">報導標題</label>
            <input id="title" type="text" name="title" class="form-control" placeholder="">
        </div>
        <div id="holder" class="text-center">
            <h1>拉進來</h1>
            <h1>或直接貼上也行</h1>
            <p id="upload" class="visible-xs-block"><label><input type="file"></label></p>
            <p id="filereader">File API & FileReader API not supported</p>
            <p id="formdata">XHR2's FormData is not supported</p>
            <p id="progress">XHR2's upload progress isn't supported</p>
            <p><progress id="uploadprogress" max="100" value="0">0</progress></p>
        </div>
        <input id="uploaded-url" type="hidden" name="pic_url" value="" class="form-control" />
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">儲存</button>
        <input id="continue" type="submit" name="continue" class="btn btn-primary pull-right" value="繼續新增">
    </form>
@endsection
