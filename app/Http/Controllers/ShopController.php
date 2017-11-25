<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShopRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class ShopController extends Controller
{
  protected $shop;
  protected $product;

  public function __construct(ShopRepositoryInterface $sh, ProductRepositoryInterface $pro) {
      $this->shop = $sh;
      $this->product = $pro;
  }

  public function index() {
    $id = session()->get('customer')->id;
    $shops = $this->shop->getByCustId($id);
    return view('pages.shop.myshop', ['shops' => $shops]);
  }

  public function shop($id) {
    $shop = $this->shop->getById($id);
    $products = $this->product->getByShopId($id);
    $isShopOwner = false;
    $custId = is_null(session()->get('customer')) ? null : session()->get('customer')->id;
    if(!is_null($custId)) {
      $check = $this->shop->checkOwner($id, $custId);
      if(!is_null($check))
        $isShopOwner = true;
    }
    return view('pages.shop.shop', ['shop' => $shop[0], 'products' => $products, 'isShopOwner' => $isShopOwner]);
  }

  public function edit($id) {
    $shop = $this->shop->getById($id);
    return view('pages.shop.edit', ['shop' => $shop[0]]);
  }

  public function editSub($id, Request $request) {
    dd($request->all());
  }

  public function create() {
    return view('pages.shop.create');
  }

  public function createSub(Request $request) {
    dd($request->all());
  }

  public function add($id) {
    $catalogs = $this->product->getCats();
    $brands = $this->product->getBrands();
    return view('pages.product.add', ['shopId' => $id, 'catalogs' => $catalogs, 'brands' => $brands]);
  }

  public function addSub($id, Request $request) {
    dd($request->all());
  }

  public function proEdit($id) {
    $product = $this->product->getById($id);
    $catalogs = $this->product->getCats();
    $brands = $this->product->getBrands();
    return view('pages.product.edit', ['product' => $product[0], 'catalogs' => $catalogs, 'brands' => $brands]);
  }

  public function proEditSub($id, Request $request) {
    dd($request->all());
  }
}
