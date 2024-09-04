<?php

namespace App\Providers;


use App\Nova\Status;
use App\Nova\Viatura;
use App\Nova\Unidade;
use App\Nova\User;
use App\Nova\Ratih;
use App\Nova\EquipeViatura;
use App\Nova\Cargo;
use Illuminate\Http\Request;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Support\Facades\Blade;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::footer(function ($request) {
            return Blade::render('
               Desenvolvido por: <a href="https://duquedecaxias.rj.gov.br/secretaria/governo/6329" target="_blank"><strong style="color: blue;">Secretaria de Governo / Subsecretaria de Tecnologia</strong></a>
           '); 
       
       });

        Nova::mainMenu(function (Request $request) {
            return [
                // MenuSection::dashboard(Main::class)->icon('chart-bar'),

                // MenuSection::make('NIR', [
                //     MenuItem::resource(User::class),
                //     MenuItem::resource(Ratih::class),
                //     MenuItem::resource(Unidade::class),
                // ])->icon('home')->collapsable(),

                MenuSection::make('TIH', [
                    MenuItem::resource(Ratih::class),
                    MenuItem::resource(Viatura::class),
                    MenuItem::resource(EquipeViatura::class),
                    MenuItem::resource(Unidade::class),
                    MenuItem::resource(Cargo::class),
                    MenuItem::resource(User::class),
                ])->icon('truck')->collapsable(),
            ];
        });
    }
    

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            (new \Sereny\NovaPermissions\NovaPermissions())->canSee(function ($request) {
                return $request->user()->isAdmin();
            }),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
