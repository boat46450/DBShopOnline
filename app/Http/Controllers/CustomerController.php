<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;
use Excel as E;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(CustomerRepositoryInterface $cust) {
        $this->customer = $cust;
    }

    public function test() {
        $sheet = E::load('/public/data.xlsx')->get();
        dd($sheet);
        E::selectSheets('brand')->load('/public/data.xlsx', function($reader) {
            $results = $reader->toArray();
            dd(sizeof($results));
            foreach ($results as $r) {
                DB::table('brands')->insert([
                    'id' => null,
                    'name' => $r['name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }); 
    }
}
