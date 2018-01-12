@inject('timelines', 'App\TimeLine')
@extends('common.base')
@section('inbody')
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script defer src="{{ asset('/js/dragnupload.js') }}"></script>
    <script defer src="{{ asset('/js/Magnifier.js') }}"></script>
    <script async src="{{ asset('/js/Event.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/magnifier.css') }}">
    <script defer src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script defer src="{{ asset('/js/report-edit.js') }}"></script>
@endsection
@section('container')
    <form action="{{route('report.update', $report->id)}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">報導時間</label>
            <input type="date" name="reported_at" class="form-control" placeholder="" value="{{ date('Y-m-d', $report->reported_at) }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">報導標題</label>
            <input type="text" name="title" class="form-control" placeholder="", value="{{ $report->title }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">時間軸</label>
            <select name="timelines[]" class="form-control" multiple>
            @foreach($timelines->all() as $timeline)
                <option value="{{ $timeline->id }}">{{ $timeline->name }}</option>
            @endforeach
            </select>
        </div>
        <div id="holder" class="">
			<a class="magnifier-thumb-wrapper" href="{{ $report->pic_url }}">
			</a>
				<img id="thumb" src="{{ $report->pic_url }}" class="img-responsive" data-large-img-url="{{ $report->pic_url }}">
            <p id="upload" class="visible-xs-block"><label><input type="file"></label></p>
            <p id="filereader">File API & FileReader API not supported</p>
            <p id="formdata">XHR2's FormData is not supported</p>
            <p id="progress">XHR2's upload progress isn't supported</p>
            <p><progress class="hidden" id="uploadprogress" max="100" value="0">0</progress></p>
        </div>
        {{ method_field('put') }}
        <input id="uploaded-url" type="hidden" name="pic_url" value="{{ $report->pic_url }}" class="form-control" />
        <textarea id="content" name="content">{{ $report->content }}</textarea>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default">送出</button>
    </form>
@endsection
