<?php

namespace ChinLeung\LaravelWeekday\Tests;

use ChinLeung\LaravelWeekday\LaravelWeekdayFacade;
use ChinLeung\LaravelWeekday\LaravelWeekdayServiceProvider;
use Orchestra\Testbench\TestCase;
use Weekday;

class WrapperTest extends TestCase
{
    /** @test **/
    public function can_parse_a_name(): void
    {
        $instance = Weekday::parse('Monday');

        $this->assertEquals(
            1,
            $instance->getValue()
        );

        $this->assertEquals(
            'Monday',
            $instance->getName()
        );
    }

    /** @test **/
    public function can_parse_a_value(): void
    {
        $instance = Weekday::parse(0);

        $this->assertEquals(
            0,
            $instance->getValue()
        );

        $this->assertEquals(
            'Sunday',
            $instance->getName()
        );
    }

    /** @test **/
    public function it_can_change_locale(): void
    {
        $instance = Weekday::parse(0);

        $this->assertEquals(app()->getLocale(), $instance->getLocale());

        $instance->to('fr');

        $this->assertEquals('fr', $instance->getLocale());
    }

    /** @test **/
    public function it_can_retrieve_a_value_from_a_name(): void
    {
        $this->assertEquals(
            0,
            Weekday::value('Sunday')
        );
    }

    /** @test **/
    public function it_can_retrieve_a_value_from_a_name_in_another_locale(): void
    {
        $this->assertEquals(
            0,
            Weekday::value('Dimanche', 'fr')
        );
    }

    /** @test **/
    public function it_can_retrieve_a_name_from_a_value(): void
    {
        $this->assertEquals(
            'Monday',
            Weekday::name(1)
        );
    }

    /** @test **/
    public function it_can_retrieve_a_name_from_a_value_in_another_locale(): void
    {
        $this->assertEquals(
            'Lundi',
            Weekday::name(1, 'fr')
        );
    }

    /** @test **/
    public function it_can_retrieve_the_names_of_a_locale(): void
    {
        $this->assertCount(7, $names = Weekday::names());

        $this->assertEquals(
            ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            $names->values()->toArray()
        );
    }

    /**
     * Retrieve the package aliases of the application.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Weekday' => LaravelWeekdayFacade::class,
        ];
    }

    /**
     * Retrieve the package providers of the application.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelWeekdayServiceProvider::class,
        ];
    }
}
