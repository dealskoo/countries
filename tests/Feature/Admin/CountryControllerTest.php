<?php

namespace Dealskoo\Country\Tests\Feature\Admin;

use Dealskoo\Country\Tests\TestCase;
use Illuminate\Support\Facades\Event;

class CountryControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Event::fake();
    }

    public function testIndex()
    {
        $count = 1;
    }

    public function testCreate()
    {

    }

    public function testStore()
    {

    }

    public function testEdit()
    {

    }

    public function testUpdate()
    {

    }

    public function testDestroy()
    {

    }
}
