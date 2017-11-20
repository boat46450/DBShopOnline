@extends('layouts.default')

@section('title'){{ trim('Catalogs') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
    <section id="catalogs">
        @include('utils.nav')
        <div class="container">
            <div class="row text-center">
                @foreach($catalogs as $catalog)
                    <div class="col-4 prod">
                      <a href="{{ url('/catalog/'.$catalog->id) }}">
                        <div class="card border-dark">
                            <button class="card-header btn btn-secondary catalog">
                              {{ $catalog->name }}
                            </button>
                        </div>
                      </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection