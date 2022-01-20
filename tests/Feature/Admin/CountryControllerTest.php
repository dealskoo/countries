<?php

namespace Dealskoo\Country\Tests\Feature\Admin;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Country\Models\Country;
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
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.index'));
        $response->assertStatus(200);
    }

    public function test_table()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $country = Country::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.show', $country));
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.create'));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $admin = Admin::factory()->isOwner()->create();
        $country = Country::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.countries.store'), $country->only([
            'name',
            'code',
            'alpha2',
            'alpha3',
            'currency',
            'currency_code',
            'currency_sub_unit',
            'currency_symbol',
            'currency_decimals',
            'currency_rate',
            'calling_code',
            'region_code',
            'sub_region_code',
            'locale'
        ]));
        $response->assertStatus(302);
    }

    public function test_edit()
    {
        $admin = Admin::factory()->isOwner()->create();
        $country = Country::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.edit', $country));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $admin = Admin::factory()->isOwner()->create();
        $cou = Country::factory()->create();
        $country = Country::factory()->make();
        $response = $this->actingAs($admin, 'admin')->put(route('admin.countries.update', $cou), $country->only([
            'name',
            'code',
            'alpha2',
            'alpha3',
            'currency',
            'currency_code',
            'currency_sub_unit',
            'currency_symbol',
            'currency_decimals',
            'currency_rate',
            'calling_code',
            'region_code',
            'sub_region_code',
            'locale'
        ]));
        $response->assertStatus(302);
    }

    public function test_destroy()
    {
        $admin = Admin::factory()->isOwner()->create();
        $country = Country::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.countries.destroy', $country));
        $response->assertStatus(200);
    }
}
