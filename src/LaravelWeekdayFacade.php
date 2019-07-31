<?php

namespace ChinLeung\LaravelWeekday;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChinLeung\LaravelWeekday\Skeleton\SkeletonClass
 */
class LaravelWeekdayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-weekday';
    }
}
