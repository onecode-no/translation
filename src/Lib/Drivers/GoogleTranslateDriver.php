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
        return $this->googleTranslate->translate($value, $source, $target)['translated_text'] ?? null;
    }
}
