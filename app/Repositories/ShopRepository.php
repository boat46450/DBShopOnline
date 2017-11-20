<?php

namespace App\Repositories;

use DB;

class ShopRepository implements ShopRepositoryInterface {
  public function getByCustId($id) {
    $results = DB::select('select s.*
                            from shops s
                            where exists (select *
                                          from userShops u
                                          where s.id = u.shopId
                                            and u.customerId = ?)', [$id]);
    return $results;
  }
}