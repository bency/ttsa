@extends('common.base')
@section('container')
    <form class="form" action="/line{{ $redirect ? '/' . $redirect->id : ''}}" method="post">
        {{ csrf_field() }}
        @if($redirect)
        {{ method_field('PUT') }}
        @endif
        <input type="hidden" name="id" value="{{ $redirect ? $redirect->id : null}}">
        <div class="form-group">
            <label for="exampleInputEmail1">短路徑</label>
            <input type="text" class="form-control" name="path" placeholder="短路徑" value="{{ $redirect ? $redirect->path : ''}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">要轉過去的網址</label>
            <input type="text" class="form-control" name="url" placeholder="要轉過去的網址" value="{{ $redirect ? $redirect->url : ''}}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
