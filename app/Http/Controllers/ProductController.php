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
        return view('pages.product.home');
    }

    protected function checkLogin() {
        
    }
}
