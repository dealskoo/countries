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
        $this->assertNotNull(PermissionManager::getPermission('countries.index'));
        $this->assertNotNull(PermissionManager::getPermission('countries.show'));
        $this->assertNotNull(PermissionManager::getPermission('countries.create'));
        $this->assertNotNull(PermissionManager::getPermission('countries.edit'));
        $this->assertNotNull(PermissionManager::getPermission('countries.destroy'));
    }
}
