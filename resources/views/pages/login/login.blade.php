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
                            <img src="/img/user.png" alt="user" class="iconInput">
                            <input type="email" name="username" id="username" class="flex1 input" placeholder="E-mail">
                        </div>
                        <div class="d-flex margin">
                            <img src="/img/padlock.png" alt="pass" class="iconInput">
                            <input type="password" name="password" id="password" class="flex1 input" placeholder="Password">
                        </div>
                        <div class="d-flex">
                            <input type="submit" value="ENTER" class="flex1 submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection