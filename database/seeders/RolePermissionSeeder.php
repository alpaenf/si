<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        $permissions = [
            // Berita permissions
            ['name' => 'View Berita', 'slug' => 'berita.view', 'description' => 'Can view berita'],
            ['name' => 'Create Berita', 'slug' => 'berita.create', 'description' => 'Can create berita'],
            ['name' => 'Edit Berita', 'slug' => 'berita.edit', 'description' => 'Can edit berita'],
            ['name' => 'Delete Berita', 'slug' => 'berita.delete', 'description' => 'Can delete berita'],
            
            // Layanan permissions
            ['name' => 'View Layanan', 'slug' => 'layanan.view', 'description' => 'Can view layanan'],
            ['name' => 'Create Layanan', 'slug' => 'layanan.create', 'description' => 'Can create layanan'],
            ['name' => 'Edit Layanan', 'slug' => 'layanan.edit', 'description' => 'Can edit layanan'],
            ['name' => 'Delete Layanan', 'slug' => 'layanan.delete', 'description' => 'Can delete layanan'],
            
            // Galeri permissions
            ['name' => 'View Galeri', 'slug' => 'galeri.view', 'description' => 'Can view galeri'],
            ['name' => 'Create Galeri', 'slug' => 'galeri.create', 'description' => 'Can create galeri'],
            ['name' => 'Edit Galeri', 'slug' => 'galeri.edit', 'description' => 'Can edit galeri'],
            ['name' => 'Delete Galeri', 'slug' => 'galeri.delete', 'description' => 'Can delete galeri'],
            
            // FAQ permissions
            ['name' => 'View FAQ', 'slug' => 'faq.view', 'description' => 'Can view FAQ'],
            ['name' => 'Create FAQ', 'slug' => 'faq.create', 'description' => 'Can create FAQ'],
            ['name' => 'Edit FAQ', 'slug' => 'faq.edit', 'description' => 'Can edit FAQ'],
            ['name' => 'Delete FAQ', 'slug' => 'faq.delete', 'description' => 'Can delete FAQ'],
            
            // Dokumen SAKIP permissions
            ['name' => 'View Dokumen SAKIP', 'slug' => 'dokumen-sakip.view', 'description' => 'Can view dokumen SAKIP'],
            ['name' => 'Create Dokumen SAKIP', 'slug' => 'dokumen-sakip.create', 'description' => 'Can create dokumen SAKIP'],
            ['name' => 'Edit Dokumen SAKIP', 'slug' => 'dokumen-sakip.edit', 'description' => 'Can edit dokumen SAKIP'],
            ['name' => 'Delete Dokumen SAKIP', 'slug' => 'dokumen-sakip.delete', 'description' => 'Can delete dokumen SAKIP'],
            
            // Slider permissions
            ['name' => 'View Slider', 'slug' => 'slider.view', 'description' => 'Can view slider'],
            ['name' => 'Create Slider', 'slug' => 'slider.create', 'description' => 'Can create slider'],
            ['name' => 'Edit Slider', 'slug' => 'slider.edit', 'description' => 'Can edit slider'],
            ['name' => 'Delete Slider', 'slug' => 'slider.delete', 'description' => 'Can delete slider'],
            
            // Settings permissions
            ['name' => 'View Settings', 'slug' => 'settings.view', 'description' => 'Can view settings'],
            ['name' => 'Edit Settings', 'slug' => 'settings.edit', 'description' => 'Can edit settings'],
            
            // User management permissions
            ['name' => 'View Users', 'slug' => 'users.view', 'description' => 'Can view users'],
            ['name' => 'Create Users', 'slug' => 'users.create', 'description' => 'Can create users'],
            ['name' => 'Edit Users', 'slug' => 'users.edit', 'description' => 'Can edit users'],
            ['name' => 'Delete Users', 'slug' => 'users.delete', 'description' => 'Can delete users'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['slug' => $permission['slug']],
                $permission
            );
        }

        // Create Roles
        $superAdmin = Role::firstOrCreate(
            ['slug' => 'super-admin'],
            [
                'name' => 'Super Admin',
                'description' => 'Has full access to all features'
            ]
        );

        $admin = Role::firstOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Admin',
                'description' => 'Can manage content but not users'
            ]
        );

        $editor = Role::firstOrCreate(
            ['slug' => 'editor'],
            [
                'name' => 'Editor',
                'description' => 'Can create and edit content'
            ]
        );

        $viewer = Role::firstOrCreate(
            ['slug' => 'viewer'],
            [
                'name' => 'Viewer',
                'description' => 'Can only view content'
            ]
        );

        // Assign all permissions to Super Admin
        $superAdmin->permissions()->sync(Permission::all());

        // Assign permissions to Admin (all except user management)
        $adminPermissions = Permission::where('slug', 'not like', 'users.%')->get();
        $admin->permissions()->sync($adminPermissions);

        // Assign permissions to Editor (view, create, edit only)
        $editorPermissions = Permission::whereIn('slug', [
            'berita.view', 'berita.create', 'berita.edit',
            'layanan.view', 'layanan.create', 'layanan.edit',
            'galeri.view', 'galeri.create', 'galeri.edit',
            'faq.view', 'faq.create', 'faq.edit',
            'dokumen-sakip.view', 'dokumen-sakip.create', 'dokumen-sakip.edit',
            'slider.view', 'slider.create', 'slider.edit',
            'settings.view',
        ])->get();
        $editor->permissions()->sync($editorPermissions);

        // Assign permissions to Viewer (view only)
        $viewerPermissions = Permission::where('slug', 'like', '%.view')->get();
        $viewer->permissions()->sync($viewerPermissions);

        $this->command->info('Roles and permissions seeded successfully!');
    }
}
