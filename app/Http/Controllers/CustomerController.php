<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class CustomerController extends Controller
{
    protected $customer;
    protected $product;

    public function __construct(CustomerRepositoryInterface $cust, ProductRepositoryInterface $pro) {
        $this->customer = $cust;
        $this->product = $pro;
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

    public function cart() {
        $product = [];
        $sum = 0;
        $cart = session()->get('cart');
        for ($i = 0; $i < sizeof($cart); $i++) {
            $detail = $this->product->getById($cart[$i]["productId"]);
            $detail[0]->priceC = (int)$cart[$i]["price"];
            $detail[0]->quantity = (int)$cart[$i]["quantity"];
            array_push($product, $detail[0]);
            $sum += (int)$cart[$i]["price"] * (int)$cart[$i]["quantity"];
        }
        // dd($product);
        return view('pages.customer.cart', ['product' => $product, 'sum' => $sum]);
    }
}
