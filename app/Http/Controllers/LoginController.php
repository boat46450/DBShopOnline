<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;

class LoginController extends Controller
{
    protected $customer;
    protected $user;
    
    public function __construct(CustomerRepositoryInterface $cust) {
        $this->customer = $cust;
    }

    public function index() {
        return view('pages.login.login');
    }

    public function login(Request $request) {
        $email = $request->username;
        $pass = $request->password;
        $results = $this->customer->getByEP($email, $pass);
        if(empty($results)) {
            return redirect('/login')->withErrors(['wrong' => 'something wrong']);
        }
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
        $cust->tel = implode("", explode("-", $cust->tel));
        session()->put('customer', $cust);
    }
}
