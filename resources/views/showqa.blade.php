@extends('common.base')
@section('inhead')
    <meta property="og:title" content="{{ isset($qa) ? $qa->subject : ''}}">
    <meta property="og:description" content="{{ isset($qa) ? $qa->response : '' }}">
@endsection
@section('container')
            <h1>機車上國道 Q&A {{ isset($qa) ? $qa->id : 1 }}</h1>
            <h3 class="text-center">{{ isset($qa) ? $qa->subject : '' }}</h3>
            <div class="alert alert-info">
                <p class="text-center">{{ isset($qa) ? $qa->response : '' }}</p>
            </div>
@endsection
