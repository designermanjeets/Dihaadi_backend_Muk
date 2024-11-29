<?php

namespace App\Currency;

use Illuminate\Support\Facades\Facade;

class CurrencyFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'currency';
    }
}
