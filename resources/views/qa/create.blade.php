@extends('common.base')
@section('inbody')
    <script async src="{{ asset('/js/dragnupload.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
CKEDITOR.replace('content', {
    language: 'zh_TW'
});
    </script>
@endsection
@section('container')
            <h3>月經文 Q&A 設定後台</h3>
            <a class="btn btn-success pull-right" href="{{ route('qa.create') }}">新增 QA</a>
            <form action="{{ isset($qa) ? route('qa.update', ['id' => $qa->id]) : route('qa.store') }}" method="post">
                {{ csrf_field() }}
                {{ isset($qa) ? method_field('PUT') : '' }}
                <div class="form-group">
                    <label>題目</label>
                    <textarea class="form-control" name="subject">{{ isset($qa) ? $qa->subject : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>回應</label>
                    <textarea id="content" class="form-control" name="response">{!! isset($qa) ? $qa->response : '' !!}</textarea>
                </div>
                <input class="btn btn-primary pull-right" value="儲存或更新" type="submit">
            </form>
@endsection
