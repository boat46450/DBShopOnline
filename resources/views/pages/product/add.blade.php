@extends('layouts.default')

@section('title'){{ trim('Add Product') }}@endsection

@section('custom_head')
  <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
  <section id="product-add">
    @include('utils.nav')
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1>Product</h2>
        </div>
      </div>
      <form method="post" action="/shop/{{$shopId}}/add">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-4 text-right">
            <p>ภาพสินค้า :</p>
          </div>
          <div class="col-4">
            <input type="file" name="cover_img" id="cover_img" accept="image/*" class="text-center">
          </div>
          <div class="col-4" id="img">
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>ชื่อสินค้า :</p>
          </div>
          <div class="col-4">
            <input type="text" name="name" id="name" class="input" required>
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>รายละเอียดสินค้า :</p>
          </div>
          <div class="col-4">
            <textarea rows="10" cols="50" name="detail" id="detail" class="input" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>ราคา :</p>
          </div>
          <div class="col-4">
            <input type="number" name="price" id="price" class="input" min="1" required>
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>จำนวน :</p>
          </div>
          <div class="col-4">
            <input type="number" name="quantity" id="quantity" class="input" min="1" required>
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>Catalog :</p>
          </div>
          <div class="col-4">
            <select name="catalogId" id="catalogId" required>
              @foreach($catalogs as $catalog)
                <option value="{{$catalog->id}}">{{ $catalog->name }}</option>
              @endforeach
              <option value="other">อื่นๆ</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <div class="col-4" id="otherCat">
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <p>Brand :</p>
          </div>
          <div class="col-4">
            <select name="brandId" id="brandId" required>
            <option value="0">ไม่มี</option>
              @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{ $brand->name }}</option>
              @endforeach
              <option value="other">อื่นๆ</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <div class="col-4" id="otherBrand">
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

@section('custom_script')
  <script src="/js/addProduct.js"></script>
@endsection