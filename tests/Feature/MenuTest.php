<?php

namespace Dealskoo\Country\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Country\Tests\TestCase;

class MenuTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_menu()
    {
        $childs = AdminMenu::findBy('title', 'admin::admin.settings')->getChilds();
        $menu = collect($childs)->where('title', 'country::country.countries');
        self::assertNotEmpty($menu);
    }
}
