<?php

namespace Dealskoo\Country\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Country\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu()
    {
        $childs = AdminMenu::findBy('title', 'admin::admin.settings')->getChilds();
        $menu = collect($childs)->where('title', 'country::country.countries');
        $this->assertNotEmpty($menu);
    }
}
