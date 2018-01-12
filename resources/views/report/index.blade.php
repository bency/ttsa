@inject('reports', 'App\Report')
@extends('common.base')
@section('container')
    <ul class="list-group">
        @foreach($reports->orderBy('reported_at', 'DESC')->get() as $report)
        <li class="list-group-item">
            <a href="{{ route('report.show', $report->id) }}">
            {{ date('Y-m-d', $report->reported_at )}} - {{ $report->title }}
            </a>
        </li>
        @endforeach
    </ul>
@endsection
