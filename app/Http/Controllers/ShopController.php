<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShopRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Carbon\Carbon;

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
    $name = $request->name;
    $detail = $request->detail;
    $pName = $request->pic->getClientOriginalName();
    $picName = 'product'.Carbon::now(7)->format('Y-m-d-H-i-s').'.'.$this->getImgType($pName);
    $request->pic->move(public_path('/img'), $picName);
    $price = (int)$request->price;
    $limit = (int)$request->limit;
    $catalogId = null;
    if($request->catalogId == 'other') {
      $create = Carbon::now(7)->format('Y-m-d H:i:s');
      $update = Carbon::now(7)->format('Y-m-d H:i:s');
      $this->product->addCat($request->otherCat, $create, $update);
      $catalogId = $this->product->getCatIdByName($request->otherCat)[0];
    }
    else {
      $catalogId = (int)$request->catalogId;
    }
    $brandId = null;
    if($request->brandId == 'other') {
      $create = Carbon::now(7)->format('Y-m-d H:i:s');
      $update = Carbon::now(7)->format('Y-m-d H:i:s');
      $this->product->addBrand($request->otherBrand, $create, $update);
      $brandId = $this->product->getBrandIdByName($request->otherBrand)[0];
    }
    else {
      $brandId = ($request->brandId == '0')? null : (int)$request->brandId;
    }
    $shopId = (int)$id;
    $create = Carbon::now(7)->format('Y-m-d H:i:s');
    $update = Carbon::now(7)->format('Y-m-d H:i:s');
    $this->product->addPro($name, $detail, $picName, $price, $limit, $catalogId, $brandId, $shopId, $create, $update);
    $proId = $this->product->getIdByPic($picName)[0]->id;
    return redirect('/product/'.$proId);
  }

  public function proEdit($id) {
    $product = $this->product->getById($id);
    $catalogs = $this->product->getCats();
    $brands = $this->product->getBrands();
    return view('pages.product.edit', ['product' => $product[0], 'catalogs' => $catalogs, 'brands' => $brands]);
  }

  public function proEditSub($id, Request $request) {
    $name = $request->name;
    $detail = $request->detail;
    $price = (int)$request->price;
    $catalogId = (int)$request->catalogId;
    $brandId = ($request->brandId == '0')? null : (int)$request->brandId;
    $update = Carbon::now(7)->format('Y-m-d H:i:s');
    $result = $this->product->update($id, $name, $detail, $price, $catalogId, $brandId, $update);
    return redirect('/product/'.$id);
  }

  protected function getImgType($name) {
    $type = explode('.', $name);
    return $type[1];
  }
}
