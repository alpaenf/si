<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RolePermissionSeeder::class);
    }

    public function test_super_admin_role_has_all_permissions(): void
    {
        $role = Role::where('slug', 'super-admin')->first();
        
        $this->assertNotNull($role);
        $this->assertTrue($role->permissions()->count() > 0);
        $this->assertTrue($role->hasPermission('berita.create'));
        $this->assertTrue($role->hasPermission('users.delete'));
    }

    public function test_admin_role_cannot_manage_users(): void
    {
        $role = Role::where('slug', 'admin')->first();
        
        $this->assertNotNull($role);
        $this->assertFalse($role->hasPermission('users.create'));
        $this->assertTrue($role->hasPermission('berita.create'));
    }

    public function test_editor_role_cannot_delete(): void
    {
        $role = Role::where('slug', 'editor')->first();
        
        $this->assertNotNull($role);
        $this->assertFalse($role->hasPermission('berita.delete'));
        $this->assertTrue($role->hasPermission('berita.edit'));
    }

    public function test_viewer_role_can_only_view(): void
    {
        $role = Role::where('slug', 'viewer')->first();
        
        $this->assertNotNull($role);
        $this->assertTrue($role->hasPermission('berita.view'));
        $this->assertFalse($role->hasPermission('berita.create'));
    }

    public function test_user_has_role_helper_methods(): void
    {
        $role = Role::where('slug', 'admin')->first();
        $user = User::factory()->create(['role_id' => $role->id]);

        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isSuperAdmin());
        $this->assertTrue($user->hasPermission('berita.create'));
    }

    public function test_user_without_role_has_no_permissions(): void
    {
        $user = User::factory()->create(['role_id' => null]);

        $this->assertFalse($user->hasRole('admin'));
        $this->assertFalse($user->hasPermission('berita.create'));
    }
}
