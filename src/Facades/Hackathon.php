<?php

namespace Avocadomedia\Hackathon\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Avocadomedia\Hackathon\Hackathon
 */
class Hackathon extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Avocadomedia\Hackathon\Hackathon::class;
    }
}
