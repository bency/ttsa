@extends('common.base')
@section('inbody')
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script src="//infographicstw.github.io/labella-ui/d3kit.min.js"></script>
    <script src="{{ asset('/js/labella.min.js') }}"></script>
    <script src="//infographicstw.github.io/labella-ui/d3kit-timeline.js"></script>
    <script defer src="{{ asset('/js/timeline-show.js') }}"></script>
@endsection
@section('container')
    <h2>{{ $timeline->name }}</h2>
    <div id="timeline"></div>
    <div class="panel-footer">
        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-order_by="time"></div>
    </div>
@endsection
