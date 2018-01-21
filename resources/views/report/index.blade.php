@extends('common.base')
@section('inbody')
    <script defer src="{{ asset('js/report-index.js') }}"></script>
@endsection
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
            @foreach($report->timelines as $timeline)
                <button type="button" class="label label-success detatch" data-timeline-id="{{ $timeline->id }}" data-report-id="{{ $report->id }}">
                    {{ $timeline->name }}
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
            @endif
        </li>
        @endforeach
    </ul>
    {{ $reports->links() }}
@endsection
