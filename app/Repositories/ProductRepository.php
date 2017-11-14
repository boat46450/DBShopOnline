<?php

namespace App\Repositories;

use DB;

class ProductRepository implements ProductRepositoryInterface {
  public function get() {
    $results = DB::select('select * 
                            from products');
    return $results;
  }
}