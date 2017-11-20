<?php

namespace App\Repositories;

use DB;

class ProductRepository implements ProductRepositoryInterface {
  public function get() {
    $results = DB::select('select *
                            from products');
    return $results;
  }

  public function getPopular() {
    $results = DB::select('select p.id, p.name, p.price, p.pic, sum(ol.quantity) 
                            from products p 
                            join orderlists ol on p.id = ol.productId 
                            group by p.id, p.name, p.price, p.pic 
                            having sum(ol.quantity) >= 2
                            order by 5 DESC');
    return $results;
  }

  public function getById($id) {
    $results = DB::select('select p.*, s.name sname, c.name cname, b.name bname
                            from products p
                            join shops s on p.shopId = s.id
                            join catalogs c on p.catalogId = c.id
                            left join brands b on p.brandId = b.id
                            where p.id = ?', [$id]);
    return $results;
  }

  public function getBrought($id) {
    $results = DB::select('select sum(ol.quantity) as brought
                            from orderlists ol
                            where ol.productId = ?
                            group by ol.productId', [$id]);
    return $results;
  }

  public function getCats() {
    $results = DB::select('select * 
                            from catalogs');
    return $results;
  }
}