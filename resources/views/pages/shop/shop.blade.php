@extends('layouts.default')

@section('title'){{ trim('SHOPS') }}@endsection

@section('custom_head')
  <link rel="stylesheet" href="/css/register.css">
  <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
	<section id="shop">
		@include('utils.nav')
		<div class="container">
			<div class="row">
        <div class="col text-center">
          <h1>{{ $shop->name }}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col underline">
          <h2>เกี่ยวกับร้าน</h2>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>รายละเอียด</p>
        </div>
        <div class="col">
          <p>{{ $shop->detail }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col underline">
          <h2>ที่ตั้งร้าน</h2>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>บ้านเลขที่</p>
        </div>
        <div class="col">
          <p>{{ $shop->houseNum }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>ถนน</p>
        </div>
        <div class="col">
          <p>{{ $shop->street }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>แขวง</p>
        </div>
        <div class="col">
          <p>{{ $shop->subDistrict }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>เขต</p>
        </div>
        <div class="col">
          <p>{{ $shop->district }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>จังหวัด :</p>
        </div>
        <div class="col">
          <p>{{ $shop->city }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>รหัสไปรษณีย์ :</p>
        </div>
        <div class="col">
          <p>{{ $shop->zipcode }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-right">
          <p>เบอร์โทรศัพท์มือถือ :</p>
        </div>
        <div class="col">
          <p>{{ $shop->tel }}</p>
        </div>
      </div>
      @if($isShopOwner)
        <div class="row">
          <div class="col text-center">
            <a href=" {{ url('/shop/'.$shop->id.'/edit') }} ">
              <button type="button" class="btn btn-warning submit">EDIT</button>
            </a>
          </div>
        </div>
      @endif
      <div class="row">
        <div class="col underline">
          <h2>สินค้าของร้าน</h2>
        </div>
      </div>
      <div class="row text-center">
        @foreach($products as $product)
          <div class="col-4 prod">
            <div class="card minibox border-dark">
              <div class="text-center">
                <img src="{{ url('/img/'.$product->pic) }}" class="img-fluid">
              </div>
              <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <div class="card-text">
                  <p class="price">ราคา {{$product->price}} บาท</p>
                </div>
                <div class="text-right">
                  <a href="{{ url('/product/'.$product->id) }}" class="btn btn-primary">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @if($isShopOwner)
          <div class="col-3 prod">
            <div class="card minibox border-dark d-flex flex-column justify-content-center">
              <h4 class="card-header text-center flex1 d-flex align-items-end justify-content-center">เพิ่มสินค้า</h4>
              <div class="card-body flex1">
                <a href=" {{ url('/shop/'.$shop->id.'/add') }} ">
                  <button class="btn btn-warning submit">
                    <i class="fa fa-plus-square-o"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
        @endif
      </div>
		</div>
	</section>
@endsection