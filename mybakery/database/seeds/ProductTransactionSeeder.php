<?php

use Illuminate\Database\Seeder;

class ProductTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 6; $i++) {
            $product = rand(2,5); 
            for ($j=1; $j <= $product; $j++) { 
                DB::table('product_transaction')->insert([
                    'product_id' => rand(2,10),
                    'transaction_id' => $i,
                    'quantity' => rand(1,3),
                    'harga_produk' => rand(1,100)*1000,
                ]);
            }
        }
    }
}
