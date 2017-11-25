@extends('layouts.default')

@section('title'){{ trim('BRANDS') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
    <section id="brands">
        @include('utils.nav')
        <div class="container">
            <div class="row text-center">
                @foreach($brands as $brand)
                    <div class="col-4 prod">
                      <a href="{{ url('/brand/'.$brand->id) }}">
                        <div class="card border-dark">
                          <button class="card-header btn btn-secondary catalog">
                            {{ $brand->name }}
                          </button>
                        </div>
                      </a>
                    </div>
                @endforeach
                <div class="col-4 prod">
                  <a href="/brand/0">
                    <div class="card border-dark">
                      <button class="card-header btn btn-secondary catalog">ไม่มี</button>
                    </div>
                  </a>
                </div>
            </div>
        </div>
    </section>
@endsection