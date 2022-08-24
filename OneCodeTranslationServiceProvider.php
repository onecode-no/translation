<?php

namespace OneCode\Translation;

use App\Console\Commands\GenerateTranslationFilesCommand;
use Illuminate\Support\ServiceProvider;
use OneCode\Translation\Console\Commands\Translation\GenerateSingleTranslationFileCommand;
use OneCode\Translation\Contracts\TranslationDriver;
use OneCode\Translation\Lib\Drivers\GoogleTranslateDriver;

class OneCodeTranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTranslationDriver();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }

        $this->publishConfigurationFiles();
    }

    private function registerCommands(): void
    {
        $this->commands([
            GenerateSingleTranslationFileCommand::class,
            GenerateTranslationFilesCommand::class,
        ]);
    }

    private function publishConfigurationFiles(): void
    {
        $this->publishes([
            __DIR__ . '/config/translation.php' => config_path('translation.php'),
        ]);
    }

    private function registerTranslationDriver(): void
    {
        $translationDriver = config('translation.driver', GoogleTranslateDriver::class);

        if ($translationDriver === GoogleTranslateDriver::class) {
            $this->app->bind(TranslationDriver::class,
                fn() => new GoogleTranslateDriver(
                    $this->app->make(\JoggApp\GoogleTranslate\GoogleTranslate::class)
                ));
        } else {
            $this->app->bind(TranslationDriver::class, fn() => $this->app->make());
        }
    }
}
