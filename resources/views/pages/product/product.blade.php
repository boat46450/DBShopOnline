@extends('layouts.default')

@section('title'){{ trim('Product') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/product.css">
@endsection

@section('content')
    <section id="product">
        @include('utils.nav')
        <div class="container-fluid con">
            <div class="row">
                <div class="col">
                    <h1>{{$product->name}}</h1>
                    <h2>By <a href="/shop/{{$product->shopId}}">{{$product->sname}}</a></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex align-items-start justify-content-center">
                    <img src="{{ url('/img/'.$product->pic) }}" alt="picture" class="img-fluid">
                </div>
                <div class="col-7">
                    <h3>Detail</h3>
                    <p id="detail">{{$product->detail}}</p>
                    <p>
                        <span class="tag">Catalog : </span>
                        <a href="{{ url('/catalog/'.$product->catalogId ) }}">
                            <button class="btn btn-info">{{ $product->cname}}</button>
                        </a>
                    </p>
                    <p>
                        <span class="tag">Brand : </span>
                        <a href="{{ url('/brand/'.(is_null($product->brandId)?0:$product->brandId)) }}">
                            <button class="btn btn-info">{{ is_null($product->bname) ? "ไม่มี" : $product->bname}}</button>
                        </a>
                    </p>
                    <p class="d-flex justify-content-center price"> ราคา {{$product->price}} บาท</p>
                    <hr>
                    <div class="d-flex justify-content-center">
                        @if($product->limit - $brought > 0)
                            <form action="/product/addCart" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="productid" id="productid" value="{{$product->id}}">
                                <input type="hidden" name="price" id="price" value="{{$product->price}}">
                                จำนวน : <input type="number" name="quantity" id="" min="1" max="{{$product->limit - $brought}}" value="1">
                                <button type="submit" class="btn btn-warning">ใส่ตะกร้า</button>
                            </form>
                        @else
                            <h3 class="text-danger">สินค้าหมด</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_script')
@endsection