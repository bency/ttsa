@extends('common.base')
@section('container')
    <ul class="list-group">
        @foreach($reports as $report)
        <li class="list-group-item">
            <a href="{{ route('report.show', $report->id) }}">
            {{ date('Y-m-d', $report->reported_at )}} - {{ $report->title }}
            </a>
            @if(Auth::check())
            <a class="label label-primary pull-right" href="{{ route('report.edit', $report->id) }}">
                <span class="glyphicon glyphicon-pencil"></span>
                編輯
            </a>
            @endif
        </li>
        @endforeach
    </ul>
@endsection
