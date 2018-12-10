<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 18-12-7
 * description:
 */

namespace Crisen\LaravelAi\Facades;


use Illuminate\Support\Facades\Facade;


class Ai extends Facade
{

    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'ai.default';
    }
}