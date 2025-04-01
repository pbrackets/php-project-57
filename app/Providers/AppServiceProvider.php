<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');
        }
        Gate::define('delete', function (User $user, Task $task) {
            return $user->id === $task->created_by_id;
        });
    }
}
