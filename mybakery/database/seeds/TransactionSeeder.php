<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 6; $i++) { 
            DB::table('transactions')->insert([
                'customer_id' => rand(1,6),
                'user_id' => rand(1,6),
                'transaction_date' => date('Y-m-d H:i:s', strtotime('-'.rand(1, 6).' days', time())),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
