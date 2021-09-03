<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
            DB::table('suppliers')->insert([
                'nama_supplier' => ucwords(str_shuffle('anasthasya averina')),
                'alamat_supplier' => "Jalan ".ucwords(str_shuffle('ambengan tengah'))." ".$i,
            ]);
        }
    }
}
