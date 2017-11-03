@inject('redirect', '\App\Redirect');
@extends('common.base')
@section('container')
    <table class="table">
        <tr>
            <th>編號</th>
            <th>短網址</th>
            <th>Url</th>
            <th><a class="pull-right btn btn-primary" href="{{ route('line.create') }}"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
        @foreach($redirect::all() as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td><input class="form-control" type="text" value="{{ url('/') . '/group/' . $r->path }}"></td>
            <td>{{ $r->url }}</td>
            <td>
                <form class="form" action="{{ route('line.destroy', ['id' => $r->id]) }}" method="post">
                    <a class="btn btn-primary" href="{{ route('line.edit', ['id' => $r->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
