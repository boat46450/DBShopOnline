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
                        <div class="card minibox border-dark">
                            <div class="text-center">
                                <img src="{{ url('/img/'.$product->pic) }}" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$product->name}}</h4>
                                <div class="card-text">
                                    <p class="price">ราคา {{$product->price}} บาท</p>
                                </div>
                                <div class="text-right info">
                                    <a href="{{ url('/product/'.$product->id) }}" class="btn btn-primary">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection