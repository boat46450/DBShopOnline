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
                @foreach($products as $product)
                    <div class="col-3 prod">
                        <a href="{{ url('/product/'.$product->id) }}">
                            <div class="minibox gray-bor">
                                <div class="row">
                                    <div class="col text-center">
                                        <img src="{{ url('/img/'.$product->pic) }}" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="name">{{$product->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="price">{{$product->price}} บาท</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection