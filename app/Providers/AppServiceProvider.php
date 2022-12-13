<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        //
        Gate::define('permissao-admin', function ($user) {

            return $user->is_admin();
        });
        Gate::define('permissao-comum', function ($user) {


            return !$user->is_admin();
        });
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add([
                'header' => 'Cadastros',
            ] );
            $event->menu->add([
                'text'        => 'Categoria',
                'url'         => 'categorias/',
                'icon'        => 'fas fa-tags',
            ] );
            $event->menu->add([

                    'text'        => 'Marcas',
                    'url'         => 'marcas/',
                    'icon'        => 'far fa-fw fa-copyright',

            ] );
            $event->menu->add([

                    'text'        => 'Produtos',
                    'url'         => 'produtos/list',
                    'icon'        => 'fas fa-fw fa-cube',

            ] );
        });
    }
}
