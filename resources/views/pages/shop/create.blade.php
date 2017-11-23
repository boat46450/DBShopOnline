@extends('layouts.default')

@section('title'){{ trim('SHOPS') }}@endsection

@section('custom_head')
  <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
	<section id="create-shop">
		@include('utils.nav')
		<div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>CREATE SHOP</h1>
                </div>
            </div>
            <form method="post" action="/shop/create">
                {{ csrf_field() }}
                <div class="row">
                <div class="col-4 text-right">
                    <p>ชื่อร้านค้า :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="name" id="name" class="input" required>
                </div>
                </div>
                <div class="row">
                <div class="col-4 text-right">
                    <p>รายละเอียด :</p>
                </div>
                <div class="col-4">
                    <textarea rows="10" cols="50" name="detail" id="detail" class="input" required></textarea>
                </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>บ้านเลขที่</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="houseNum" id="houseNum" class="input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>ถนน</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="street" id="street" class="input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>แขวง</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="subDistrict" id="subDistrict" class="input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>เขต</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="district" id="district" class="input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>จังหวัด :</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="city" id="city" class="input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>รหัสไปรษณีย์ :</p>
                    </div>
                    <div class="col-4">
                        <input type="text" name="zipcode" id="zipcode" class="input" required pattern="[0-9]{5}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right">
                        <p>เบอร์โทรศัพท์มือถือ :</p>
                    </div>
                    <div class="col-4">
                        <input type="tel" name="tel" id="tel" class="input" required pattern="[0-9]{10}">
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