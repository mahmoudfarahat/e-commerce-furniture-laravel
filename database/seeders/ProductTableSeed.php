<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index){
            DB::table('products')->insert([
                'prodname' =>  $faker ->sentence(5),
                'prodpicture' => $faker ->sentence(5),
                'prodprice' => $faker ->sentence(5)
            ]);
        }
        //

    }
}
