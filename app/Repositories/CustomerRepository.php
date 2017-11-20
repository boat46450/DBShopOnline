<?php

namespace App\Repositories;

use DB;

class CustomerRepository implements CustomerRepositoryInterface {
  public function get() {
    $results = DB::select('select * 
                            from customers');
    return $results;
  }

  public function getById($id) {
    $results = DB::select('select * 
                            from customers 
                            where id = ?', [$id]);
    return $results;
  }

  public function getByEP($email, $password) {
    $results = DB::select('select * 
                            from customers 
                            where email = ? 
                            and password = ?', [$email, $password]);
    return $results;
  }
}