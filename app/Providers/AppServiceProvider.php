<?php

namespace App\Providers;

use App\Models\PrivilegioUser;
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

            (!Auth::user()->is_admin() && (
                PrivilegioUser::where('privilegio_id', 1)->where('user_id', Auth::user()->id)->exists()
                ||
                PrivilegioUser::where('privilegio_id', 2)->where('user_id', Auth::user()->id)->exists()
                ||
                PrivilegioUser::where('privilegio_id', 3)->where('user_id', Auth::user()->id)->exists()
                )
            ) ? $event->menu->add([
                        'header' => 'Cadastros',
                ]) : null;
            (!Auth::user()->is_admin() && PrivilegioUser::where('privilegio_id', 1)->where('user_id', Auth::user()->id)->exists()) ? $event->menu->add([
                'text'        => 'Categoria',
                'url'         => 'categorias/list',
                'icon'        => 'fas fa-tags',
            ]) : null;
            (!Auth::user()->is_admin() && PrivilegioUser::where('privilegio_id', 2)->where('user_id', Auth::user()->id)->exists()) ? $event->menu->add([

                'text'        => 'Marcas',
                'url'         => 'marcas/list',
                'icon'        => 'far fa-fw fa-copyright',

            ]) : null;
            (!Auth::user()->is_admin() && PrivilegioUser::where('privilegio_id', 3)->where('user_id', Auth::user()->id)->exists()) ? $event->menu->add([

                'text'        => 'Produtos',
                'url'         => 'produtos/list',
                'icon'        => 'fas fa-fw fa-cube',

            ]) : null;
        });
    }
}
