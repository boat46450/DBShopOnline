@extends('layouts.default')

@section('title'){{ trim('REGISTER') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
    <section id="register">
        @include('utils.nav')
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Register</h1>
                </div>
            </div>
            <form method="post" action="/register">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <h2>Account</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>E-mail :</p>
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>Password :</p>
                    </div>
                    <div class="col">
                        <input type="password" name="password" id="password" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Profile</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>ชื่อ :</p>
                    </div>
                    <div class="col">
                        <input type="text" name="name" id="name" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>นามสกุล :</p>
                    </div>
                    <div class="col">
                        <input type="text" name="surname" id="surname" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>บ้านเลขที่</p>
                    </div>
                    <div class="col">
                        <input type="text" name="houseNum" id="houseNum" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>ถนน</p>
                    </div>
                    <div class="col">
                        <input type="text" name="street" id="street" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>แขวง</p>
                    </div>
                    <div class="col">
                        <input type="text" name="subDistrict" id="subDistrict" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>เขต</p>
                    </div>
                    <div class="col">
                        <input type="text" name="district" id="district" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>จังหวัด :</p>
                    </div>
                    <div class="col">
                        <input type="text" name="city" id="city" class="input" required>
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>รหัสไปรษณีย์ :</p>
                    </div>
                    <div class="col">
                        <input type="text" name="zipcode" id="zipcode" class="input" required pattern="[0-9]{5}">
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <p>เบอร์โทรศัพท์มือถือ :</p>
                    </div>
                    <div class="col">
                        <input type="tel" name="tel" id="tel" class="input" required pattern="[0-9]{10}">
                    </div>
                    <div class="col no-pa">
                        <p class="red">*</p>
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