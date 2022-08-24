<?php

namespace OneCode\Translation\Contracts;


interface TranslationDriver
{
    public function translate(string $value, string $source, string $target): ?string;
}
