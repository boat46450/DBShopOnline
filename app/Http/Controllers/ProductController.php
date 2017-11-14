<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepositoryInterface $pro) {
        $this->product = $pro;
    }

    public function index() {
        $products = $this->product->get();
        return view('pages.product.home', ['products' => $products]);
    }

    public function popular() {
        return view('pages.product.popular');
    }

    public function product($id) {
        return view('pages.product.product');
    }
}
