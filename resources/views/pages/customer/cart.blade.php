@extends('layouts.default')

@section('title'){{ trim('CART') }}@endsection

@section('custom_head')
@endsection

@section('content')
	<section id="cart">
		@include('utils.nav')
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h1>CART</h1>
				</div>
			</div>
			<div class="row">
        <div class="col text-center">
          @if(!empty($product))
            <table class="table table-hover table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">สินค้า</th>
                  <th scope="col">ภาพสินค้า</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">ราคา(บาท)</th>
                </tr>
              </thead>
              <tbody>
                @for($i = 0; $i < sizeof($product); $i++)
                  <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td class="text-left">{{ $product[$i]->name }}</td>
                    <td>
                      <img src="{{ url('/img/'.$product[$i]->pic) }}" class="img">
                    </td>
                    <td>{{ $product[$i]->quantity }}</td>
                    <td>{{ $product[$i]->quantity * $product[$i]->priceC }}</td>
                  </tr>
                @endfor
                <tr>
                  <th scope="row" colspan="4">รวม</th>
                  <td>{{ $sum }}</td>
                </tr>
                <tr>
                  <th colspan="5">
                    <a href="/buy">
                      <button class="btn btn-warning">สั่งซื้อ</button>
                    </a>
                  </th>
                </tr>
              </tbody>
            </table>
          @else
            <h3>ยังไม่มีสินค้าในตะกร้า</h3>
          @endif
				</div>
			</div>
		</div>
	</section>
@endsection