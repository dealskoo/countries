<?php

namespace Dealskoo\Country\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Country\Tests\TestCase;

class PermissionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testPermissions()
    {
        self::assertNotNull(PermissionManager::getPermission('countries.index'));
        self::assertNotNull(PermissionManager::getPermission('countries.show'));
        self::assertNotNull(PermissionManager::getPermission('countries.create'));
        self::assertNotNull(PermissionManager::getPermission('countries.edit'));
        self::assertNotNull(PermissionManager::getPermission('countries.destroy'));
    }
}
