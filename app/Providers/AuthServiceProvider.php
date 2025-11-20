<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; // Importa Gate aquí
use App\Models\User; // Asegúrate de importar el modelo User
use App\Policies\UserPolicy; // Asegúrate de importar tu política

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', [UserPolicy::class, 'admin']);
        Gate::define('chofer', [UserPolicy::class, 'chofer']);
        Gate::define('dpto', [UserPolicy::class, 'dpto']);
    }
}
