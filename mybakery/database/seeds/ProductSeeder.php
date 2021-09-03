<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 9; $i++) {
            $nama_produk = "";
            $foto_produk = "";
            $category_id = 1;
            switch ($i) {
                case 1:
                    $nama_produk = "Puding Vanila";
                    $foto_produk = "puding_vanila.jpg";
                    $category_id = 1;
                    break;
                case 2:
                    $nama_produk = "Puding Purin";
                    $foto_produk = "puding_purin.jpg";
                    $category_id = 1;
                    break;
                case 3:
                    $nama_produk = "Puding Butterscotch";
                    $foto_produk = "puding_butterscotch.jpg";
                    $category_id = 1;
                    break;
                case 4:
                    $nama_produk = "Kuping Gajah";
                    $foto_produk = "kue_kering_kuping_gajah.jpg";
                    $category_id = 2;
                    break;
                case 5:
                    $nama_produk = "Nastar Daun";
                    $foto_produk = "kue_kering_nastar_daun.jpg";
                    $category_id = 2;
                    break;
                case 6:
                    $nama_produk = "Sagu Keju";
                    $foto_produk = "kue_kering_sagu_keju.jpg";
                    $category_id = 2;
                    break; 
                case 7:
                    $nama_produk = "Tart Buah";
                    $foto_produk = "tart_buah.jpg";
                    $category_id = 3;
                    break;
                case 8:
                    $nama_produk = "Tart Cokelat";
                    $foto_produk = "tart_coklat.jpg";
                    $category_id = 3;
                    break;
                case 9:
                    $nama_produk = "Tart Custard";
                    $foto_produk = "tart_custard.jpg";
                    $category_id = 3;
                    break;   
                default:
                    $nama_produk = "";
                    $foto_produk = "";
                    $category_id = 1;
                    break;
            }
            DB::table('products')->insert([
                'nama_produk' => $nama_produk,
                'harga_produk' => rand(1,100)*1000,
                'stok_produk' => rand(1,10),
                'foto_produk' => $foto_produk,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'category_id' => $category_id,
                'supplier_id' => rand(1,3),
            ]);
        }
    }
}
