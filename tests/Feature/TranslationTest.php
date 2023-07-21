<?php

use OneCode\Translation\Contracts\TranslationDriver;
use OneCode\Translation\Lib\Drivers\OpenAIDriver;


it('can load any driver', function () {
    $driver = new class implements TranslationDriver {
        static array $messages = [
            'en' => [
                'foo' => [
                    'joke' => 'bar',
                ]
            ]
        ];

        public function translate(string $value, string $source, string $target): ?string
        {
            return static::$messages[$source][$value][$target] ?? null;
        }
    };

    app()->singleton(TranslationDriver::class, fn() => $driver);

    $translated = app(TranslationDriver::class)->translate('foo', 'en', 'joke');

    expect($translated)->toBe('bar');
});

it('translates using OpenAI', function () {
    /** @var OpenAIDriver $driver */
    $driver = app(OpenAIDriver::class);
    $translated = $driver->translate('Hello, my name is Peter.', 'en', 'no');


    expect($translated)->toBeString();
    expect($translated)->toBe('Hei, navnet mitt er Peter.');
});

//it('translates using Google Translate', function() {
////    throw new \RuntimeException('Not implemented');
//});
