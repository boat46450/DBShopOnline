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
}
