@extends('layouts.default')

@section('title'){{ trim('My Order') }}@endsection

@section('custom_head')
@endsection

@section('content')
    <section id="order">
        @include('utils.nav')
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1>Order</h2>
            </div>
          </div>
        </div>
    </section>
@endsection