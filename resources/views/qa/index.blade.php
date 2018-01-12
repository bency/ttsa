@extends('common.base')
@section('container')
<div class="page-header">
    <h1>月經文 Q&A 列表</h1>
</div>
<div class="center-block">
@foreach($qas as $qa)
    <div class="panel panel-default col-md-12 ">
        <div class="panel-heading">
            <a href="{{ route('qa.show', ['id' => $qa->id]) }}">
                <span class="glyphicon glyphicon-question-sign"></span>
                 {{ $qa->subject }}
            </a>
            @if(Auth::check())
            <a class="pull-right" href="{{ route('qa.edit', $qa->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
            @endif
        </div>
        <div class="panel-body">
            {!! $qa->response !!}
        </div>
    </div>
@endforeach
</div>
{{ $qas->links() }}
@endsection
