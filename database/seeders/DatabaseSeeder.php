<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        // password
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user = \App\Models\User::factory()->create([
            'name' => 'Renato Lucena',
            'email' => 'cpdrenato@gmail.com',
        ]);
        $user->assignRole('admin');
        //\App\Models\User::factory(10)->create();
    }
}
