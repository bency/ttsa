@extends('common.base')
@section('container')
<form method="post" action="{{ route('timeline.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>時間軸名稱</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="時間軸名稱" value="{{ old('name') }}">
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
