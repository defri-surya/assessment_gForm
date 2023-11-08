<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('isSuperadmin', function ($user) {
            return $user->role == 'superadmin';
        });

        Gate::define('isGuruBK', function ($user) {
            return $user->role == 'gurubk';
        });

        Gate::define('isSiswa', function ($user) {
            return $user->role == 'siswa';
        });

        Gate::define('isAfiliator', function ($user) {
            return $user->role == 'afiliator';
        });
    }
}
