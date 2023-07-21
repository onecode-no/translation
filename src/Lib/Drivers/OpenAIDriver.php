<?php

namespace OneCode\Translation\Lib\Drivers;


use Illuminate\Support\Facades\Http;
use OneCode\Translation\Contracts\TranslationDriver;

class OpenAIDriver implements TranslationDriver
{
    static string $openAiApiHost = 'https://api.openai.com';
    static string $openAiApiVersion = 'v1';
    static string $openAiPath = 'chat/completions';
    static string $openAiModel = 'gpt-4';

    public function __construct(
        private readonly string $apiToken,
    )
    {
    }

    public static function useGtp3(): void
    {
        static::$openAiModel = 'gpt-3';
    }

    public function translate(string $value, string $source, string $target): ?string
    {
        $payload = $this->getPayload($value, $source, $target);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->apiToken,
        ])->post($this->getUrl(), $payload);

        return $response->json()['choices'][0]['message']['content'] ?? null;
    }

    private function getUrl(): string
    {
        return join('/', [
            self::$openAiApiHost,
            self::$openAiApiVersion,
            self::$openAiPath,
        ]);
    }

    private function getPayload(string $value, string $source, string $target): array
    {
        //with OpenAI it is better to provide the full language code instead of a single language
        [$mapSource, $mapTarget] = [
            str_contains('_', $source),
            str_contains('_', $target),
        ];

        $mapping = array_flip(config('translation.locales.mapping', []));

        if ($mapSource && isset($mapping[$source])) {
            $source = $mapping[$source] ?? $source;
        }

        if ($mapTarget && isset($mapping[$target])) {
            $target = $mapping[$target] ?? $target;
        }

        return [
            "model" => self::$openAiModel,
            "messages" => [
                [
                    "role" => "system",
                    "content" => "You will be provided with a sentence in $source, and your task is to translate it into $target."
                ],
                [
                    "role" => "user",
                    "content" => $value,
                ]
            ],
            "temperature" => 0,
            "max_tokens" => 256
        ];
    }
}