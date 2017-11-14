<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;

class LoginController extends Controller
{
    protected $customer;
    
    public function __construct(CustomerRepositoryInterface $cust) {
        $this->customer = $cust;
    }

    public function index() {
        return view('pages.login.login');
    }

    public function login(Request $request) {
        $email = $request->username;
        $pass = $request->password;
        dd($email.'  '.$pass);
    }

    public function logout() {

    }

    public function register() {
        return view('pages.login.register');
    }

    public function submitRe(Request $request) {
        dd($request->all());
    }
}
