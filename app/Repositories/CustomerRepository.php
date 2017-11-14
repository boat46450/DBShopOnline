<?php

namespace App\Repositories;

use DB;

class CustomerRepository implements CustomerRepositoryInterface {
  public function get() {
    $results = DB::table('customers')->get();
    return $results;
  }

  public function getById($id) {
    $results = DB::table('customers')
              ->where('id', '=', $id)
              ->get();
    return $results;
  }
}