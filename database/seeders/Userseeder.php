<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

use Illuminate\Support\Facades\DB;
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('customers')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'role' => '1',
                'updated_at' => "2021-11-20 19:19:13",
                "created_at" =>"2021-11-20 19:19:13"


            ]
         ]);
    }
}
