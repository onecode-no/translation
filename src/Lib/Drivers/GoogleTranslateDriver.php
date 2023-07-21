<?php

namespace OneCode\Translation\Lib\Drivers;


use OneCode\Translation\Contracts\TranslationDriver;
use JoggApp\GoogleTranslate\GoogleTranslate;

class GoogleTranslateDriver implements TranslationDriver
{
    public function __construct(
        protected GoogleTranslate $googleTranslate,
    )
    {
    }

    public function translate(string $value, string $source, string $target): ?string
    {
        $mapping = config('translation.locales.mapping', []);

        $source = $mapping[$source] ?? $source;
        $target = $mapping[$target] ?? $target;

        return $this->googleTranslate->translate($value, $source, $target)['translated_text'] ?? null;
    }
}
