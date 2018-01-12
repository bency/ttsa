@extends('common.base')
@section('container')
            <h1>月經文 Q&A {{ isset($qa) ? $qa->id : 1 }}</h1>
    <div class="panel panel-default col-md-12">
        <div class="panel-heading">
            {{ $qa->subject }}
            @if(Auth::check())
            <a class="pull-right" href="{{ route('qa.edit', $qa->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
            @endif
        </div>
        <div class="panel-body">
            {!! $qa->response !!}
        </div>
        <div class="panel-footer">
            <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-order_by="time"></div>
        </div>
    </div>
@endsection
