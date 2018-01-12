@extends('common.base')
@section('inhead')
    <meta name="og:image:width" content="{{ $og_image_width }}">
    <meta name="og:image:height" content="{{ $og_image_height }}">
@endsection
@section('container')
    <a class="magnifier-thumb-wrapper text-center" href="{{ $report->pic_url }}" target="_blank">
        <img id="thumb" src="{{ $report->pic_url }}" class="img-responsive" data-large-img-url="{{ $report->pic_url }}">
    </a>
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <small class="pull-right">{{ date('Y-m-d', $report->reported_at) }}</small>
            <h1>{{ $report->title }}</h1>
        </div>
        <div class="panel-body report-content">
        {!! $report->content !!}
        </div>
        <div class="panel-footer">
            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-order_by="time"></div>
        </div>
    </div>
@endsection
