<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Config::set([
            'success_add' => "Data baru berhasil ditambahkan !",
            'success_edit' => "Data berhasil diubah !",
            'success_delete' => "Data berhasil dihapus !",
        ]);
    }
}
