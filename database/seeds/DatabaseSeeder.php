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
                    'customerId' => $r['customerId'],
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
                    'userId' => $r['userId'],
                    'shopId' => $r['shopId'],
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
                    'catalogId' => $r['catalogId'],
                    'brandId' => $r['brandId'],
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
                    'price' => $r['peice'],
                    'limit' => $r['limit'],
                    'brandCatalogId' => $r['brandCatalogId'],
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
                    'customerId' => $r['customerId'],
                    'paymentId' => $r['paymentId'],
                    'shippingId' => $r['shippingId'],
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
                    'orderId' => $r['orderId'],
                    'productId' => $r['productId'],
                    'quantity' => $r['quantity'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });
    }
}
