@extends('common.base')
@section('container')
<div class="page-header">
    <h1>月經文 Q&A 設定後台</h1>
</div>
@foreach($qas as $qa)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $qa->subject }}
            <a class="pull-right" href="{{ route('qa.edit', $qa->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <div class="panel-body">
            {!! $qa->response !!}
        </div>
    </div>
@endforeach
{{ $qas->links() }}
@endsection
