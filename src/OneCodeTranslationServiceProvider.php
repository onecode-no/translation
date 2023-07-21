<?php

namespace OneCode\Translation;

use App\Console\Commands\GenerateTranslationFilesCommand;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use OneCode\Translation\Console\Commands\Translation\GenerateSingleTranslationFileCommand;
use OneCode\Translation\Contracts\TranslationDriver;
use OneCode\Translation\Lib\Drivers\GoogleTranslateDriver;
use OneCode\Translation\Lib\Drivers\OpenAIDriver;
use OneCode\Translation\Lib\TranslationDriverFactory;

class OneCodeTranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslationDriver();
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->publishConfigurationFiles();
        }
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
        $this->app->bind(
            GoogleTranslateDriver::class,
            fn() => new GoogleTranslateDriver(
                googleTranslate: $this->app->make(
                    \JoggApp\GoogleTranslate\GoogleTranslate::class,
                )
            )
        );

        $this->app->bind(
            OpenAIDriver::class,
            fn() => new OpenAIDriver(
                Env::get('OPENAI_API_KEY')
            )
        );

        $this->app->singleton(
            TranslationDriver::class,
            fn() => $this->app->make(
                Config::get('translation.driver', GoogleTranslateDriver::class),
            ),
        );
    }
}
