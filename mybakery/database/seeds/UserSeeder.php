<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 6; $i++) { 
            DB::table('users')->insert([
                'name' => ucwords(str_shuffle('anasthasya averina')),
                'email' => str_shuffle('peyinperjo')."@gmail.com",
                'password' => '$2a$12$FsDmXDaSiSn5EigsjfeoZe/Ss/3BH4JvasKkR.tzYoi/DkELpxsaq'
            ]);
        }
    }
}
