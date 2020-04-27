<?php

namespace ChinLeung\LaravelWeekday;

use ChinLeung\Weekday\Weekday as PhpWeekday;
use Illuminate\Support\Collection;

class Weekday
{
    /**
     * The weekday instance.
     *
     * @var \ChinLeung\Weekday\Weekday
     */
    protected $instance;

    /**
     * Constructor of the class.
     *
     * @param  \ChinLeung\Weekday\Weekday  $instance
     */
    public function __construct(PhpWeekday $instance = null)
    {
        $this->instance = $instance;
    }

    /**
     * Forward the call to the Weekday instance.
     *
     * @param  string  $method
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->getInstance()->$method(...$arguments);
    }

    /**
     * Retrieve the Weekday instance.
     *
     * @return  \ChinLeung\Weekday\Weekday
     */
    public function getInstance(): PhpWeekday
    {
        return $this->instance ?? new PhpWeekday;
    }

    /**
     * Retrieve the locale.
     *
     * @param  string|null  $locale
     * @return string
     */
    private function locale(?string $locale): string
    {
        return $locale ?: app()->getLocale();
    }

    /**
     * Retrieve the name of a weekday.
     *
     * @param  int  $value
     * @param  string  $locale
     * @return string
     */
    public function name(int $value, string $locale = null): string
    {
        return static::parse($value, $locale)
            ->getInstance()
            ->getName();
    }

    /**
     * Retrieve the list of names for a locale.
     *
     * @param  string  $locale
     * @return \Illuminate\Support\Collection
     */
    public function names(string $locale = null): Collection
    {
        return collect(PhpWeekday::getNames($this->locale($locale)));
    }

    /**
     * Parse a value and return an instance.
     *
     * @param  string|int  $value
     * @param  string  $locale
     * @return self
     */
    public function parse($value, string $locale = null): self
    {
        return new static(
            PhpWeekday::parse($value, $this->locale($locale))
        );
    }

    /**
     * Change the locale of the instance.
     *
     * @param  string  $locale
     * @return self
     */
    public function to(string $locale): self
    {
        $this->getInstance()->setLocale($locale);

        return $this;
    }

    /**
     * Retrieve the value of a weekday.
     *
     * @param  string  $name
     * @param  string  $locale
     * @return string
     */
    public function value(string $name, string $locale = null): int
    {
        return static::parse($name, $locale)
            ->getInstance()
            ->getValue();
    }
}
