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
    // public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // $this->configureRateLimiting();

        parent::boot();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    // protected function configureRateLimiting()
    // {
    //     RateLimiter::for('api', function (Request $request) {
    //         return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
    //     });
    // }

    // buat fungsi route map untuk mendefinisikan route khusu dompet
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();

        $this->mapDompetRoutes();
        $this->mapKategoriRoutes();

        $this->mapDompetMasukRoutes();
        $this->mapDompetKeluarRoutes();
    }

    public function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    }

    public function mapApiRoutes()
    {
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }

    // Mendefinisikan masing masing group route, agar lebih terstruktur

    public function mapDompetRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dompet/dompet.php'));
    }

    public function mapKategoriRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/kategori/kategori.php'));
    }

    public function mapDompetMasukRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/transaksi/dompet_masuk.php'));
    }

    public function mapDompetKeluarRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/transaksi/dompet_keluar.php'));
    }
}
