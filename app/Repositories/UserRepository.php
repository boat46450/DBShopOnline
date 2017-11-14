<?php

namespace App\Repositories;

use DB;

class UserRepository implements UserRepositoryInterface {
  public function get() {
    $results = DB::select('select * 
                            from users');
    return $results;
  }

  public function getByEP($email, $password) {
    $results = DB::select('select id
                            from users
                            where email = ?
                            and password = ?', [$email, $password]);
    return $results;
  }
}