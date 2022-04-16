<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = 'dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
//     protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            /**
             * Web routes
             */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            /**
             * Backend Web routes
             */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix'))
                ->as(config('app.admin_prefix') . '.')
                ->group(base_path('routes/backend/web/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix'))
                ->as(config('app.admin_prefix') . '.')
                ->group(base_path('routes/backend/web/pages.php'));

            /**
             * Backend Api routes
             */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/employees.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/roles.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/permissions.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/stock-statuses.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/manufacturers.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/tax-rates.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->prefix(config('app.admin_prefix') . '/api/v1')
                ->as(config('app.admin_prefix') . '.api.v1.')
                ->group(base_path('routes/backend/api/v1/products.php'));

            /**
             * Api routes
             */
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            /**
             * Frontend Api routes
             */
            Route::prefix('api')
                ->middleware('api')
                ->prefix('/api/v1')
                ->namespace($this->namespace)
                ->group(base_path('routes/frontend/api/auth.php'));

            Route::prefix('api')
                ->middleware('api')
                ->prefix('/api/v1')
                ->namespace($this->namespace)
                ->group(base_path('routes/frontend/api/user.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
