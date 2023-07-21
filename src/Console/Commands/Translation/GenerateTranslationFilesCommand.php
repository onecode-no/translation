<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use JoggApp\GoogleTranslate\GoogleTranslate;
use OneCode\Translation\Console\Commands\Translation\GenerateSingleTranslationFileCommand;

class GenerateTranslationFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translates all language files from current app locale.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $locale = App::currentLocale();

        $targets = config('translation.locales.mapping', []);

        foreach ($targets as $targetLocale => $target) {
            Artisan::call(GenerateSingleTranslationFileCommand::class, [
                'source' => $locale,
                'destination' => $targetLocale,
            ]);
        }


        return 0;
    }


}
