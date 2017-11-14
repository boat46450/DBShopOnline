@extends('layouts.default')

@section('title'){{ trim('HOME') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
    <section id="home">
        @include('utils.nav')
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-3">asdw
                </div>
                <div class="col-3">xzc</div>
                <div class="col-3">fgd</div>
                <div class="col-3">cvbn</div>
                <div class="col-3">asd</div>
            </div>
        </div>
    </section>
@endsection