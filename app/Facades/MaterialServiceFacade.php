<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MaterialServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MaterialService';
    }
}
