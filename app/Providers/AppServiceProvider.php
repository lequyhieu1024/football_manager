<?php

namespace App\Providers;

use App\Repositories\ClubRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryInterface;
use App\Repositories\PlayerRepository;
use App\Repositories\CoachRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, UserRepository::class);
        $this->app->bind(RepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(RepositoryInterface::class, ClubRepository::class);
        $this->app->bind(RepositoryInterface::class, CoachRepository::class);

        require_once app_path('Http/Helpers.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
