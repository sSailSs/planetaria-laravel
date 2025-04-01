<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 👤 Utilisateur normal
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'is_admin' => false,
            'password' => bcrypt('user123'),
        ]);

        // 👑 Utilisateur admin
        User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('admin123'), 
        ]);

        $this->call([
            PlanetSeeder::class,
        ]);
    }
}

