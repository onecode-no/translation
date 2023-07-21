<?php

use OneCode\Translation\Contracts\TranslationDriver;
use OneCode\Translation\Lib\Drivers\OpenAIDriver;



it('can load any driver', function () {
    $driver = new class implements TranslationDriver {
        static array $messages = [
            '1337' => [
                'foo'=> [
                    '7331'=> 'bar',
                ]
            ]
        ];

        public function translate(string $value, string $source, string $target): ?string
        {
           return static::$messages[$source][$value][$target] ??null;
        }
    };

    app()->bind(TranslationDriver::class, fn()=>$driver);

    $translated = app(TranslationDriver::class)->translate('foo', '1337', '7331');

    expect($translated)->toBe('bar');
});

it('translates using OpenAI', function () {
    $driver = app(OpenAIDriver::class);
    $translated = $driver->translate('Hello, my name is Peter. Do you know where i can find New York?', 'en', 'no');

    print_r($translated);

    expect($translated)->toBeString();
    expect($translated)->toBe('Hei, navnet mitt er Peter. Vet du hvor jeg kan finne New York?');
});

//it('translates using Google Translate', function() {
////    throw new \RuntimeException('Not implemented');
//});
