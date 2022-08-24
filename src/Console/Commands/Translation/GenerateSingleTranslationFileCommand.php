<?php

namespace OneCode\Translation\Console\Commands\Translation;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use OneCode\Translation\Contracts\TranslationDriver;

class GenerateSingleTranslationFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:single {source=en_US} {destination=nb_NO} {path=_use_default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate language files and updates translations';
    private string|null $localeFilePath = null;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $targets = config('commands.locale.mapping', []);

        $sourceLocale = $this->argument('source');
        $destinationLocale = $this->argument('destination');
        $sourcePath = $this->argument('path');

        if ($sourcePath === '_use_default') {
            $this->localeFilePath = resource_path('lang/%s.json');
        } else {
            $this->localeFilePath = base_path($sourcePath);
        }

        if (!isset($targets[$sourceLocale])) {
            throw new \RuntimeException(sprintf('Source (%s) locale is not supported.', $sourceLocale));
        }
        if (!isset($targets[$destinationLocale])) {
            throw new \RuntimeException(sprintf('Destination (%s) locale is not supported.', $destinationLocale));
        }

        if (!file_exists($this->languageFilePath($sourceLocale))) {
            throw new \RuntimeException('Source locale file does not exist, therefore no output can be created.');
        }

        $translated = $this->createTranslation(
            $targets[$sourceLocale],
            $targets[$destinationLocale],
            $this->languageFilePath($sourceLocale)
        );

        File::put($this->languageFilePath($destinationLocale), json_encode($translated, JSON_PRETTY_PRINT));

        $this->info(sprintf(
            'Translated %s to %s => %s',
            $sourceLocale,
            $destinationLocale,
            $this->languageFilePath($destinationLocale)
        ));

        return 0;
    }

    protected function createTranslation(string $source, string $target, string $file): array
    {
        /** @var TranslationDriver $translator */
        $translator = app(TranslationDriver::class);
        $keys = Arr::dot(json_decode(File::get($file), true));
        $output = [];

        foreach ($keys as $key => $value) {
            $output[$key] = $translator->translate($value, $source, $target);
        }

        return Arr::undot($output);
    }

    protected function languageFilePath(string $locale): string
    {
        return sprintf($this->localeFilePath, $locale);
    }
}
