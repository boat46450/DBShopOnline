<?php

namespace App\Repositories;

use DB;

class UserRepository implements UserRepositoryInterface {
  public function get() {
    $results = DB::table('users')->get();
    return $results;
  }

  public function getByEP($email, $password) {
    $results = DB::table('users')
              ->select('id')
              ->where([
                  ['email', '=', $email],
                  ['password', '=', $password]
                ])
              ->get();
    return $results;
  }
}