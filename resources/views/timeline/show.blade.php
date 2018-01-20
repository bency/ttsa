@extends('common.base')
@section('inhead')
    <link href="{{ asset('/css/c3.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('inbody')
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script defer src="{{ asset('/js/c3.min.js') }}"></script>
    <script defer src="{{ asset('/js/timeline-show.js') }}"></script>
@endsection
@section('container')
    <h2>{{ $timeline->name }}</h2>
    <div id="timeline"></div>
    <div class="panel-footer">
        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-order_by="time"></div>
    </div>
@endsection
