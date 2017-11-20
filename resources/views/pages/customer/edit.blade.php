@extends('layouts.default')

@section('title'){{ trim('Edit Profile') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
    <section id="profile-edit">
        @include('utils.nav')
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1>Profile</h2>
            </div>
          </div>
          <form method="post" action="/profile/edit">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-4 text-right">
                    <p>ชื่อ :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="name" id="name" class="input" required value="{{session('customer')->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-right">
                    <p>นามสกุล :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="surname" id="surname" class="input" required value="{{session('customer')->surname}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-right">
                    <p>บ้านเลขที่</p>
                </div>
                <div class="col-4">
                    <input type="text" name="houseNum" id="houseNum" class="input" required value="{{session('customer')->houseNum}}">
                </div>
            </div>
            <div class="row">
                    <div class="col-4 text-right">
                        <p>ถนน</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="street" id="street" class="input" required value="{{session('customer')->street}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>แขวง</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="subDistrict" id="subDistrict" class="input" required value="{{session('customer')->subDistrict}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>เขต</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="district" id="district" class="input" required value="{{session('customer')->district}}">
                    </div>
                </div>
            <div class="row">
                <div class="col-4 text-right">
                    <p>จังหวัด :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="city" id="city" class="input" required value="{{session('customer')->city}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-right">
                    <p>รหัสไปรษณีย์ :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="zipcode" id="zipcode" class="input" required pattern="[0-9]{5}" value="{{session('customer')->zipcode}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-right">
                    <p>เบอร์โทรศัพท์มือถือ :</p>
                </div>
                <div class="col-4">
                    <input type="tel" name="tel" id="tel" class="input" required pattern="[0-9]{10}" value="{{session('customer')->tel}}">
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