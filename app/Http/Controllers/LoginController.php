<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class LoginController extends Controller
{
    protected $customer;
    protected $user;
    
    public function __construct(CustomerRepositoryInterface $cust, UserRepositoryInterface $usr) {
        $this->customer = $cust;
        $this->user = $usr;
    }

    public function index() {
        return view('pages.login.login');
    }

    public function login(Request $request) {
        $email = $request->username;
        $pass = $request->password;
        $results = $this->user->getByEP($email, $pass);
        if(empty($results)) {
            return redirect('/login')->withErrors(['wrong' => 'something wrong']);
        }
        $results = $this->customer->getById($results[0]->id);
        $this->createSesCust($results[0]);
        return redirect('/');
    }

    public function logout() {
        session()->forget('customer');
        return redirect('/');
    }

    public function register() {
        return view('pages.login.register');
    }

    public function submitRe(Request $request) {
        dd($request->all());
    }

    protected function createSesCust($cust) {
        session()->put('customer', $cust);
    }
}
