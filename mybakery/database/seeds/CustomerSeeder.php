<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 6; $i++) { 
            DB::table('customers')->insert([
                'nama_customer' => ucwords(str_shuffle('anasthasya averina')),
                'alamat_customer' => "Jalan ".ucwords(str_shuffle('ambengan tengah'))." ".$i,
            ]);
        }
    }
}
