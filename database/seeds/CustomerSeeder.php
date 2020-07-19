<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('customer')->insert([
                'customer_status_id' => rand(1, 2),
                'name' => Str::random(10)
            ]);
        }
    }
}
