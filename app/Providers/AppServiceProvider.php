<?php

namespace App\Providers;

use App\Repositories\ContactRepository;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Repositories\MessageRepository;
use App\Services\ConnectService;
use App\Services\ConversationService;
use App\Services\Interfaces\ConnectServiceInterface;
use App\Services\Interfaces\ConversationServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\MessageService;
use App\View\Composers\AuthUserComposer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Load all the helper files
        collect(value: glob(pattern: app_path(path: 'Helpers') . '/*.php'))->map(callback: fn ($i) => File::requireOnce($i));

        // Register all repositories
        $this->app->bind(abstract: ContactRepositoryInterface::class, concrete: ContactRepository::class);
        $this->app->bind(abstract: MessageRepositoryInterface::class, concrete: MessageRepository::class);

        // Register all services
        $this->app->bind(abstract: ConnectServiceInterface::class, concrete: ConnectService::class);
        $this->app->bind(abstract: ConversationServiceInterface::class, concrete: ConversationService::class);
        $this->app->bind(abstract: MessageServiceInterface::class, concrete: MessageService::class);
    }

    /**
     * Bootstrap any application services
     * @return void
     */
    public function boot(): void
    {
        // Prevent the database migration during production
        DB::prohibitDestructiveCommands(prohibit: $this->app->environment('production'));

        // Bind global variables into the views
        View::composer(['livewire.*'], AuthUserComposer::class);
    }
}
