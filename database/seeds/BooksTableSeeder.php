<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {
	

    static $publisher = [
        'Pearson', 
        'TMH', 
        'Penguin', 
        'Random House' ,
        'Penguin', 
        'FreePress', 
        'Jaico', 
        'Routledge', 
        'Dell', 
        'MIT Press',
        'Wiley'
    ];


    static $books = [
        'Fundamentals of Wavelets', 
        'Data Smart ', 
        'Superfreakonomics  ', 
        'Random House' ,
        'Orientalism', 
        'Burning Bright ', 
        'Identity & Violence', 
        'Rationality & Freedom', 
        'Unpopular Essays', 
        'Crime and Punishment', //10
        'On Education',
        'Phantom of Manhattan', 
        'Ashenden of The British Agent', 
        'Zen & The Art of Motorcycle Maintenance', 
        'We the Living' ,
        'History of Western Philosophy', 
        'Jim Corbett Omnibus', 
        'Design with OpAmps', 
        'Ayn Rand Answers', 
        'Philosophy: Who Needs It', 
    ];


  static $isbn10 = [
        '0005534186',
        '0978110196',
        '0978108248',
        '0978194527',
        '0978194004',
        '0978194985',
        '0978171349',
        '0978039912',
        '0978031644',
        '0978168968',
        '0978179633',
        '0978006232',
        '0978195248',
        '0978125029',
        '0978078691',
        '0978152476',
        '0978153871',
        '0978125010',
        '0593139135',
        '0441013597'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        /**
         * We are going to insert 100 books.
         */

        $faker = Faker::create();
       foreach (self::$books as $key=>$book) {
            DB::table('books')->insert([
                'title' => $book,
                 'ISBN' => self::$isbn10[$key],
                 'publisher' => self::$publisher[$faker->numberBetween($min = 0, $max = 10)],
                 'price' => $faker->randomNumber(4),
 				 'published_at' => $faker->dateTime($max = 'now'),
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }

}
