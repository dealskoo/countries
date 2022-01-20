<?php

namespace Dealskoo\Country\Tests\Feature\Admin;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Country\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class CountryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Event::fake();
    }

    public function test_index()
    {
        $count = 1;
        $admin = Admin::factory()->create();
    }

    public function test_create()
    {

    }

    public function test_store()
    {

    }

    public function test_edit()
    {

    }

    public function test_update()
    {

    }

    public function test_destroy()
    {

    }
}
