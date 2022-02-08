<?php

namespace Dealskoo\Country\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Country\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions()
    {
        self::assertNotNull(PermissionManager::getPermission('countries.index'));
        self::assertNotNull(PermissionManager::getPermission('countries.show'));
        self::assertNotNull(PermissionManager::getPermission('countries.create'));
        self::assertNotNull(PermissionManager::getPermission('countries.edit'));
        self::assertNotNull(PermissionManager::getPermission('countries.destroy'));
    }
}
