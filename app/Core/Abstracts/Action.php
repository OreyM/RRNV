<?php

namespace App\Core\Abstracts;

use Illuminate\Support\Facades\App;

abstract class Action
{

    public static function call($class, array $parameters = [])
    {
        if ($parameters) {
            return App::make($class, $parameters)->run();
        }

        return App::make($class)->run();
    }

    abstract protected function run();
}
