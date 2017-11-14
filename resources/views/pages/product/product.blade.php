@extends('layouts.default')

@section('title'){{ trim('Product') }}@endsection

@section('custom_head')
    {{--  <link rel="stylesheet" href="/css/home.css">  --}}
@endsection

@section('content')
    <section id="product">
        @include('utils.nav')
        <div class="container-fluid">
            
        </div>
    </section>
@endsection