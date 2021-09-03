<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nama_kategori' => 'puding',
        ]);
        DB::table('categories')->insert([
            'nama_kategori' => 'kue kering',
        ]);
        DB::table('categories')->insert([
            'nama_kategori' => 'tart',
        ]);
    }
}
