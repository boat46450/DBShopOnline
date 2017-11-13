@extends('layouts.default')

@section('title'){{ trim('HOME') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
    <section id="home">
        @include('utils.nav')
    </section>
@endsection