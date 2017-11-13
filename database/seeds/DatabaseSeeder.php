<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use \Excel as E;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        E::selectSheets('customer')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('customers')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'surname' => $r['surname'],
                    'address' => $r['address'],
                    'city' => $r['city'],
                    'zipcode' => $r['zipcode'],
                    'tel' => $r['tel'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('user')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('users')->insert([
                    'id' => null,
                    'email' => $r['email'],
                    'password' => $r['password'],
                    'customerId' => (int)$r['customerid'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('shop')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('shops')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'detail' => $r['detail'],
                    'address' => $r['address'],
                    'city' => $r['city'],
                    'zipcode' => $r['zipcode'],
                    'tel' => $r['tel'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('userShop')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('userShops')->insert([
                    'id' => null,
                    'userId' => (int)$r['userid'],
                    'shopId' => (int)$r['shopid'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('brand')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('brands')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('catalog')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('catalogs')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('brandCatalog')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('brandCatalogs')->insert([
                    'id' => null,
                    'catalogId' => (int)$r['catalogid'],
                    'brandId' => is_null($r['brandid']) ? null : (int)$r['brandid'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('product')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('products')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'detail' => $r['detail'],
                    'pic' => $r['pic'],
                    'price' => $r['price'],
                    'limit' => $r['limit'],
                    'brandCatalogId' => (int)$r['brandcatalogid'],
                    'shopId' => (int)$r['shopid'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('payment')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('payments')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('shipping')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('shippings')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('order')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('orders')->insert([
                    'id' => null,
                    'customerId' => (int)$r['customerid'],
                    'paymentId' => (int)$r['paymentid'],
                    'shippingId' => (int)$r['shippingid'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });

        E::selectSheets('orderList')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            foreach ($results as $r) {
                DB::table('orderLists')->insert([
                    'id' => null,
                    'orderId' => (int)$r['orderid'],
                    'productId' => (int)$r['productid'],
                    'quantity' => (int)$r['quantity'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });
    }
}
