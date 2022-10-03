<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['guard_name' => 'web', 'name' => 'student']);
        Role::create(['guard_name' => 'web', 'name' => 'manager_classroom']);
        Role::create(['guard_name' => 'web', 'name' => 'manager']);
        Role::create(['guard_name' => 'web', 'name' => 'admin']);
        Role::create(['guard_name' => 'web', 'name' => 'lecturers']);

        $student = User::create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456',
            'status' => 1,
            'address' => "Ha Noi",
            'role_id' => 1,
        ]);

        $manager_classroom = User::create([
            'name' => 'manager_classroom',
            'email' => 'manager_classroom@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456',
            'status' => 1,
            'address' => "Ha Noi",
            'role_id' => 2,
        ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456',
            'status' => 1,
            'address' => "Ha Noi",
            'role_id' => 2,
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456',
            'status' => 1,
            'address' => "Ha Noi",
            'role_id' => 3,
        ]);

        $lecturers = User::create([
            'name' => 'lecturers',
            'email' => 'lecturers@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456',
            'status' => 1,
            'address' => "Ha Noi",
            'role_id' => 2,
        ]);
        $student->assignRole("student");

        $manager_classroom->assignRole("manager_classroom");
        $manager->assignRole("manager");
        $admin->assignRole("admin");
        $lecturers->assignRole("lecturers");
    }
}
