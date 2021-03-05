<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookStatusTableSeeder extends Seeder {


	static $types = [
        'AVAILABLE',  // this is for book i.e available
        'CHECKED_OUT', // this is for book i.e not available
        'CHECKIN', // this is for user when he checkin a book  
        'CHECKOUT' // this is for user when he check out a boook
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        /**
         * We are going to insert 500 products.
         */

        $faker = Faker::create();
        foreach (self::$types as $type) {
            DB::table('status')->insert([
                'type' => $type,
            ]);
        }
    }

}
