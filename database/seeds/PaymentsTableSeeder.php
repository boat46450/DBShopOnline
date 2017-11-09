<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use \Excel as E;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
