<?php

namespace Avocadomedia\Hackathon\Facades;

use Illuminate\Support\Facades\Facade;

class Hackathon extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Avocadomedia\Hackathon\Hackathon::class;
    }
}
