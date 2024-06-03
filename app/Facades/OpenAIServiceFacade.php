<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OpenAIServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OpenAIService';
    }
}
