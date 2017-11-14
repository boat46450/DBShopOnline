@extends('layouts.default')

@section('title'){{ trim('Login') }}@endsection

@section('custom_head')
    <link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')
    <section id="login">
        <div class="contrainer-fluid full d-flex align-items-center justify-content-center">
            <div class="flex1 d-flex justify-content-center">
                <div class="gray-border">
                    <form method="post" action="/login">
                        {{ csrf_field() }}
                        <div class="text-center margin">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <div class="d-flex margin">
                            <img src="/img/icon/user.png" alt="user" class="iconInput">
                            <input type="email" name="username" id="username" class="flex1 input" placeholder="E-mail">
                        </div>
                        <div class="d-flex margin">
                            <img src="/img/icon/padlock.png" alt="pass" class="iconInput">
                            <input type="password" name="password" id="password" class="flex1 input" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-warning button submit text">LOGIN</button>
                            </div>
                            <div class="col">
                                <a href="/register">
                                    <button type="button" class="btn btn-primary button text">REGISTER</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_script')
  <script>
    @if($errors->first('wrong'))
      swal("เกิดข้อผิดพลาด", "คุณใส่ E-mail หรือ รหัสผ่านผิด กรุณาลองอีกครั้ง", "error");
    @endif
  </script>
@endsection