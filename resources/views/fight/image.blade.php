@extends('common.base')
@section('inbody')
    <script src="{{ asset('/js/fight-club.js') }}"></script>
@endsection
@section('container')
<article>
    <div id="holder" class="text-center">
        <h1>來 丟進來</h1>
    </div>
    <p id="upload" class="visible-xs-block"><label><input type="file"></label></p>
    <p id="filereader">File API & FileReader API not supported</p>
    <p id="formdata">XHR2's FormData is not supported</p>
    <p id="progress">XHR2's upload progress isn't supported</p>
    <p><progress id="uploadprogress" max="100" value="0">0</progress></p>
</article>
@endsection
