@inject('redirect', '\App\Redirect');
@extends('common.base')
@section('container')
    <table class="table">
        <tr>
            <th>編號</th>
            <th>短網址</th>
            <th>Url</th>
            <th><a class="btn btn-primary" href="{{ route('line.create') }}">新增</a></th>
        </tr>
        @foreach($redirect::all() as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td><input class="form-control" type="text" value="{{ url('/') . '/group/' . $r->path }}"></td>
            <td>{{ $r->url }}</td>
            <td><a class="btn btn->primary" href="{{ route('line.edit', ['id' => $r->id]) }}"><span class=""></span>編輯</a></td>
        </tr>
        @endforeach
    </table>
@endsection
