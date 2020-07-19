<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $status = [
            'Pending',
            'Cancelled',
            'Completed'
        ];

        for ($i = 1; $i <= 100; $i++) {
            DB::table('order')->insert([
                'customer_id' => rand(1, 10),
                'order_status' => $status[rand(0, 2)],
                'order_total' => rand(1, 40000) / 100, // Random total between $0.01 and $400
                'created_date_time' => new Carbon(strToTime(now()) - rand(0, 63072000)) // Random date between now and 5 years ago
            ]);
        }
    }
}
