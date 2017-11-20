<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ShopRepositoryInterface;

class ProductController extends Controller
{
    protected $product;
    protected $shop;

    public function __construct(ProductRepositoryInterface $pro, ShopRepositoryInterface $sh) {
        $this->product = $pro;
        $this->shop = $sh;
    }

    public function index() {
        $products = $this->product->get();
        return view('pages.product.home', ['products' => $products]);
    }

    public function popular() {
        $products = $this->product->getPopular();
        return view('pages.product.popular', ['products' => $products]);
    }

    public function product($id) {
        $product = $this->product->getById($id);
        $brought = $this->product->getBrought($id);
        $brought = (int)$brought[0]->brought;
        // dd(is_null($product[0]->brandId));
        return view('pages.product.product', ['product' => $product[0], 'brought' => $brought]);
    }

    public function addCart(Request $request) {
        if(is_null(session()->get('cart'))) {
            $product = [
                [
                    'productId' => $request->productid,
                    'price' => $request->price,
                    'quantity' => $request->quantity
                ]
            ];
            session()->put('cart', $product);
        }
        else {
            $product = session()->get('cart');
            $add = [
                'productId' => $request->productid,
                'price' => $request->price,
                'quantity' => $request->quantity
            ];
            array_push($product, $add);
            session()->put('cart', $product);
        }
        return back();
    }
    public function catalogs() {
        $catalogs = $this->product->getCats();
        return view('pages.product.catalogs', ['catalogs' => $catalogs]);
    }

    public function test() {
        dd(session()->get('cart'));
    }
}
