@extends('layouts.default')

@section('title'){{ trim('Edit Product') }}@endsection

@section('custom_head')
  <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
  <section id="product-edit">
    @include('utils.nav')
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1>Product</h2>
        </div>
      </div>
      <form method="post" action="/profile/edit">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-4 text-right">
            <p>ชื่อสินค้า :</p>
          </div>
          <div class="col-4">
            <input type="text" name="name" id="name" class="input" required value="{{session('customer')->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <button type="submit" class="btn btn-warning submit">SUBMIT</button>
            <button type="reset" class="btn btn-danger">RESET</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection