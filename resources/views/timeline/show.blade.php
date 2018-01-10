@extends('common.base')
@section('inbody')
    <script src="{{ asset('/js/d3.min.js') }}"></script>
    <script src="//infographicstw.github.io/labella-ui/d3kit.min.js"></script>
    <script src="{{ asset('/js/labella.min.js') }}"></script>
    <script src="//infographicstw.github.io/labella-ui/d3kit-timeline.js"></script>
@endsection
@section('container')
    <script defer src="{{ asset('/js/timeline-show.js') }}"></script>
    <h2>{{ $timeline->name }}</h2>
    <div id="timeline"></div>
@endsection
