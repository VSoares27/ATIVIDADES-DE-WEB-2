<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        Gate::define('manage-users', function($user){ // apenas pode ter acesso para gerenciar os usuários
            return $user->role === 'admin';
        });

        Gate::define('manage-books', function ($user) { // apenas pode ter acesso para gerenciar, os usuários e bibliotecario
            return in_array($user->role, ['admin', 'library']);
        });

        
        Gate::define('manage-categories', function ($user) { // apenas pode ter acesso para gerenciar, os usuários e bibliotecario
            return in_array($user->role, ['admin', 'library']);
        });

        
        Gate::define('manage-authors', function ($user) { // apenas pode ter acesso para gerenciar, os usuários e bibliotecario
            return in_array($user->role, ['admin', 'library']);
        });

        
        Gate::define('manage-publishers', function ($user) { // apenas pode ter acesso para gerenciar, os usuários e bibliotecario
            return in_array($user->role, ['admin', 'library']);
        });

        
        Gate::define('view-books', function ($user) { // todos podem acessar para ver os livros
            return in_array($user->role, ['admin', 'library', 'client']);
        });

        Gate::define('manage-debtors', function ($user) { 
            return in_array($user->role, ['admin', 'library']);
        });

    }
}
