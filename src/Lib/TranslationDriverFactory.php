<?php

namespace OneCode\Translation\Lib;


use OneCode\Translation\Contracts\TranslationDriver;

class TranslationDriverFactory
{

    /** @var array<string, callable<TranslationDriver>> */
    protected static array $driverFactories = [];

    public static function register(string $class, callable $callback): void
    {
        static::$driverFactories[$class] = $callback;
    }

    public static function make(string $class): TranslationDriver
    {
        if (!isset(static::$driverFactories[$class])) {
            throw new \InvalidArgumentException('The translation driver does not have a factory.');
        }

        /** @var TranslationDriver|mixed $driver */
        $driver = call_user_func(static::$driverFactories[$class]);

        if (!$driver instanceof TranslationDriver) {
            throw new \InvalidArgumentException('The translation driver is invalid.');
        }

        return $driver;
    }
}