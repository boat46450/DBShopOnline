@extends('layouts.default')

@section('title'){{ trim('Profile') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
    <section id="profile">
        @include('utils.nav')
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>ชื่อ :</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>นามสกุล :</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->surname}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>บ้านเลขที่</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->houseNum}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>ถนน</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->street}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>แขวง</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->subDistrict}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>เขต</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->district}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>จังหวัด :</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->city}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>รหัสไปรษณีย์ :</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->zipcode}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <p>เบอร์โทรศัพท์มือถือ :</p>
                </div>
                <div class="col">
                    <p>{{session('customer')->tel}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="/profile/edit">
                        <button type="button" class="btn btn-warning submit">EDIT</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection