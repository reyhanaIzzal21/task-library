<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@perpustakaan.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('admin');

        // Create sample user
        $user = User::firstOrCreate(
            ['email' => 'user@perpustakaan.com'],
            [
                'name' => 'User Perpustakaan',
                'password' => bcrypt('password'),
            ]
        );
        $user->assignRole('user');

        // Seed categories and books
        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
