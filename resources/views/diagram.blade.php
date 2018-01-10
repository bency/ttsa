@extends('common.base')
@section('inhead')
    <link href="{{ asset('/css/c3.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('inbody')
    <script defer src="{{ asset('/js/d3.min.js') }}"></script>
    <script defer src="{{ asset('/js/c3.min.js') }}"></script>
    <script defer src="{{ asset('/js/diagram.js') }}"></script>
@endsection
@section('container')
    <h1>駕照數量與機動車輛數分析圖</h1>
    <section id="everything">
    </section>
    <h1>各車種涉入事故比例</h1>
    <a class="pull-right" href="http://talas-pub.iot.gov.tw/MainQuery.aspx" target="_blank">來源 <span class="glyphicon glyphicon-share"></span></a>
    <section id="accident"></section>
    <h1> 2015 道路交通事故率－按車種分</h1>
    <section id="a1accident"></section>
@endsection
