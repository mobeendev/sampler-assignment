<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {


	static $places = [
        'Berlin',
        'Budapest',
        'Cincinnati',
        'Denver',
        'Helsinki',
        'Lisbon',
        'Moscow',
        'Nairobi',
        'Oslo',
        'Rio',
        'Tokyo'
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

        // foreach (self::$places as $place) {
        //     DB::table('places')->insert([
        //         'name' => $place,
        //         'visited' => rand(0,1) == 1
        //     ]);
        // }

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 500; $i++) {
            DB::table('books')->insert([
                'title' => $faker->title,
                 'ISBN' => faker->ISBN,
                'description' => $faker->paragraph(),
                'price' => $faker->numberBetween(100,2000);
 				'visited' => rand(0,1,2) == 1
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }

    //Thanks to: http://stackoverflow.com/a/38691102/867418
    private function mt_rand_float($min, $max, $countZero = '0') {
        $countZero = +('1' . $countZero);
        $min = floor($min * $countZero);
        $max = floor($max * $countZero);
        $rand = mt_rand($min, $max) / $countZero;
        return $rand;
    }

}
