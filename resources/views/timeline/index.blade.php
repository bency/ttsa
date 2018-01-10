@inject('timelines', 'App\TimeLine')
@extends('common.base')
@section('container')
    <h2>時間軸列表</h2>
    <ul class="list-group">
        @foreach($timelines->all() as $timeline)
        <li class="list-group-item">
            <a class="" href="{{ route('timeline.show', $timeline->id) }}">
            {{ $timeline->name }}
            </a>
            @if(Auth::check())
            <a class="label label-primary pull-right" href="{{ route('timeline.edit', $timeline->id) }}">
                <span class="glyphicon glyphicon-pencil"></span>
                編輯
            </a>
            @endif
        </li>
        @endforeach
    </ul>
@endsection
