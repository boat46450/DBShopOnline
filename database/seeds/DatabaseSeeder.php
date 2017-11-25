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
                    'email' => $r['email'],
                    'password' => $r['password'],
                    'name' => $r['name'],
                    'surname' => $r['surname'],
                    'houseNum' => $r['housenum'],
                    'street' => $r['street'],
                    'subDistrict' => $r['subdistrict'],
                    'district' => $r['district'],
                    'city' => $r['city'],
                    'zipcode' => $r['zipcode'],
                    'tel' => $r['tel'],
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
                    'houseNum' => $r['housenum'],
                    'street' => $r['street'],
                    'subDistrict' => $r['subdistrict'],
                    'district' => $r['district'],
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
                    'customerId' => $r['customerid'],
                    'shopId' => $r['shopid'],
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
                    'catalogId' => $r['catalogid'],
                    'brandId' => $r['brandid'],
                    'shopId' => $r['shopid'],
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
                    'customerId' => $r['customerid'],
                    'paymentId' => $r['paymentid'],
                    'totalPrice' => $r['total'],
                    'houseNum' => $r['housenum'],
                    'street' => $r['street'],
                    'subDistrict' => $r['subdistrict'],
                    'district' => $r['district'],
                    'city' => $r['city'],
                    'zipcode' => $r['zipcode'],
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
                    'orderId' => $r['orderid'],
                    'productId' => $r['productid'],
                    'shippingId' => $r['shippingid'],
                    'quantity' => $r['quantity'],
                    'price' => $r['price'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        });
    }
}
