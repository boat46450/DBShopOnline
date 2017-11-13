@extends('layouts.default')

@section('title'){{ trim('HOME') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
    <section id="home">
        <nav class="no-ma-pa">
            <div class="nav-logo">
                <img src="/img/logo.png" alt="logo" class="logo">
            </div>
            
        </nav>
    </section>
@endsection