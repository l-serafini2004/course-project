<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        'admin' => Admin::class,
    ];

    public static function resolve($key){
        if(!$key) return;

        $middleware = static::MAP[$key];

        if(!$middleware){
            throw new \Exception("NON ce coviddi");
        }

        (new $middleware)->handle();

    }
}