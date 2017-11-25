@extends('layouts.default')

@section('title'){{ trim('My Order') }}@endsection

@section('custom_head')
@endsection

@section('content')
    <section id="order">
        @include('utils.nav')
        <div class="container-fluid">
          <div class="row">
            <div class="col text-center">
              <h1>Order</h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">รหัสสั่งซื้อ</th>
                    <th scope="col" class="text-center">สั่งซื้อเมื่อ</th>
                    <th scope="col" class="text-center">สถานะการจ่ายเงิน</th>
                    <th scope="col" class="text-center">สินค้า</th>
                    <th scope="col" class="text-center">ราคา(ต่อชิ้น)</th>
                    <th scope="col" class="text-center">จำนวน</th>
                    <th scope="col" class="text-center">รวม(บาท)</th>
                    <th scope="col" class="text-center">สถานะการจัดส่ง</th>
                  </tr>
                </thead>
                <tbody>
                  @for($i = 0; $i < count($orders); $i++)
                    @if($i > 0 && $orders[$i]->oid != $orders[$i-1]->oid)
                      <tr>
                        <th scope="row" class="text-right" colspan="6">รวมทั้งสิ้น</th>
                        <td>{{ $orders[$i-1]->totalPrice }} บาท</td>
                      </tr>
                    @endif
                    <tr>
                      <th scope="row" class="text-center">
                        @if($i > 0 && $orders[$i]->oid == $orders[$i-1]->oid)
                        @else
                          {{ $orders[$i]->oid }}
                        @endif
                      </th>
                      <td class="text-center">
                        @if($i > 0 && $orders[$i]->oid == $orders[$i-1]->oid)
                        @else
                          {{ $orders[$i]->ocre }}
                        @endif
                      </td>
                      <td class="text-center">
                        @if($i > 0 && $orders[$i]->oid == $orders[$i-1]->oid)
                        @else
                          {{ $orders[$i]->pname }}
                        @endif
                      </td>
                      <td>{{ $orders[$i]->name }}</td>
                      <td class="text-right">{{ $orders[$i]->olprice }}</td>
                      <td class="text-center">{{ $orders[$i]->quantity }}</td>
                      <td class="text-right">{{ $orders[$i]->olprice * $orders[$i]->quantity }}</td>
                      <td class="text-center">{{ $orders[$i]->sname }}</td>
                    </tr>
                    @if($i == count($orders) - 1)
                      <tr>
                        <th scope="row" class="text-right" colspan="6">รวมทั้งสิ้น</th>
                        <td>{{ $orders[$i]->totalPrice }} บาท</td>
                      </tr>
                    @endif
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>
@endsection