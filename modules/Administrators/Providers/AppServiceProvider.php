<?php


namespace PiloteFramework\Administrators\Providers;


use Illuminate\Database\Eloquent\Factory;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Config;
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
        $this->registerProviders();
        $this->registerViews();
        $this->registerConfigs();
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerThemes();
        $this->registerSites();

    }

    /**
     * Bootstrap any application services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->bootMiddlewares($router);
    }

    private function registerProviders()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    private function registerViews()
    {
        $sourcePath = __DIR__ . "/../Views";
        $this->loadViewsFrom(array_merge((array_map(function ($path) {
            return $path . "/";
        }, Config::get("view.paths"))),[$sourcePath]),"administrators");
    }

    private function registerConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . "/../Config/app_config.php", "administrators.app_configurations");
        $this->mergeConfigFrom(__DIR__ . "/../Config/menu_config.php", "administrators.menu_configurations");
        $this->mergeConfigFrom(__DIR__ . "/../Config/site_config.php", "administrators.site_configurations");
        $this->mergeConfigFrom(__DIR__ . "/../Config/auth_config.php", "administrators.auth_configurations");
        $this->mergeConfigFrom(__DIR__ . "/../Config/guards_config.php", "auth.guards");
        $this->mergeConfigFrom(__DIR__ . "/../Config/providers_config.php", "auth.providers");
        $this->mergeConfigFrom(__DIR__ . "/../Config/passwords_config.php", "auth.passwords");
    }

    private function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");
    }

    private function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(__DIR__ . "/../Database/Factories");
        }
    }

    private function registerThemes()
    {
    }

    private function registerSites()
    {
    }

    /**
     * @param Router $router
     */
    private function bootMiddlewares(Router $router)
    {
//$router->aliasMiddleware("administrator.redirect_if_not_administrator",);
//$router->aliasMiddleware("administrator.redirect_if_administrator",);
//$router->aliasMiddleware("administrator.authenticate_if_administrator",);
    }

    /**
     * get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
