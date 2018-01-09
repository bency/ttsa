@extends('common.base')
@section('container')
            <h1>機車上國道 Q&A {{ isset($qa) ? $qa->id : 1 }}</h1>
            <h3 class="text-center">{{ isset($qa) ? $qa->subject : '' }}</h3>
            <div class="alert alert-info">
                <p class="text-center">{!! isset($qa) ? $qa->response : '' !!}</p>
            </div>
@endsection
