<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(CustomerRepositoryInterface $cust) {
        $this->customer = $cust;
    }

    public function index() {
        return view('pages.customer.profile');
    }

    public function profile() {
        return view('pages.customer.edit');
    }

    public function edit(Request $request) {
        dd($request->all());
        return redirect('/profile');
    }

    public function order() {
        return view('pages.customer.order');
    }
}
