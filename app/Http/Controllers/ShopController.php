<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShopRepositoryInterface;

class ShopController extends Controller
{
  protected $shop;

  public function __construct(ShopRepositoryInterface $sh) {
      $this->shop = $sh;
  }

  public function index() {
    $id = session()->get('customer')->id;
    $shops = $this->shop->getByCustId($id);
    // dd($shops);
    return view('pages.shop.myshop', ['shops' => $shops]);
  }

  public function create() {
    return view('pages.shop.create');
  }
}
