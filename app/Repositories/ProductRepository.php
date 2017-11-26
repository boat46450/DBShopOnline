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
                            join orderLists ol on p.id = ol.productId 
                            group by p.id, p.name, p.price, p.pic 
                            having sum(ol.quantity) >= 2
                            order by 5 DESC');
    return $results;
  }

  public function getByName($name) {
    $results = DB::select('select * 
                            from products
                            where name like ?', [$name]);
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
                            from orderLists ol
                            where ol.productId = ?
                            group by ol.productId', [$id]);
    return $results;
  }

  public function getCats() {
    $results = DB::select('select * 
                            from catalogs');
    return $results;
  }

  public function getCat($id) {
    $results = DB::select('select * 
                            from products 
                            where catalogId = ?', [$id]);
    return $results;
  }

  public function getByShopId($id) {
    $results = DB::select('select *
                            from products
                            where shopId = ?', [$id]);
    return $results;
  }

  public function getBrands() {
    $results = DB::select('select * 
                            from brands');
    return $results;
  }

  public function getBrand($id) {
    $results = null;
    if($id == 0) {
      $results = DB::select('select *
                              from products
                              where brandId is null');
    }
    else {
      $results = DB::select('select *
                              from products
                              where brandId = ?', [$id]);
    }
    return $results;
  }

  public function update($id, $name, $detail, $price, $catalogId, $brandId, $update) {
    $results = DB::update('update products
                            set name = ?,
                                detail = ?,
                                price = ?,
                                catalogId = ?,
                                brandId = ?,
                                updated_at = ?
                            where id = ?', [$name, $detail, $price, $catalogId, $brandId, $update, $id]);
    return $results;
  }

  public function addCat($name, $create, $update) {
    DB::insert('insert into catalogs (id, name, created_at, updated_at)
                values (?, ?, ?, ?)', [null, $name, $create, $update]);
  }

  public function getCatIdByName($name) {
    $results = DB::select('select id
                            from catalogs
                            where name = ?', [$name]);
    return $results;
  }

  public function addBrand($name, $create, $update) {
    DB::insert('insert into brands (id, name, created_at, updated_at)
                values (?, ?, ?, ?)', [null, $name, $create, $update]);
  }

  public function getBrandIdByName($name) {
    $results = DB::select('select id
                            from brands
                            where name = ?', [$name]);
    return $results;
  }

  public function addPro($name, $detail, $pic, $price, $limit, $catalogId, $brandId, $shopId, $create, $update) {
    DB::insert('insert into products (id, name, detail, pic, price, `limit`, catalogId, brandId, shopId, created_at, updated_at) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                [null, $name, $detail, $pic, $price, $limit, $catalogId, $brandId, $shopId, $create, $update]);
  }

  public function getIdByPic($pic) {
    $results = DB::select('select id
                            from products
                            where pic = ?', [$pic]);
    return $results;
  }
}