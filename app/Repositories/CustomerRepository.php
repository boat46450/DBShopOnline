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

  public function getOrderById($id) {
    $results = DB::select('select o.id oid, o.totalPrice, o.created_at ocre, p.name pname,
                                  ol.quantity, ol.price olprice, s.name sname, pr.*
                            from orders o
                            join payments p on o.paymentId = p.id
                            join orderLists ol on o.id = ol.orderId
                            join shippings s on ol.shippingId = s.id
                            join products pr on ol.productId = pr.id
                            where o.customerId = ?
                            order by 1', [$id]);
    return $results;
  }
}