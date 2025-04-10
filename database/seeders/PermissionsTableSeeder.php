<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'student_create',
            ],
            [
                'title' => 'student_edit',
            ],
            [
                'title' => 'student_show',
            ],
            [
                'title' => 'student_delete',
            ],
            [
                'title' => 'student_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
