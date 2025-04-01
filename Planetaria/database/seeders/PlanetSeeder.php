<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Planet;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planets = [
            [
                'name' => 'Mercure',
                'type' => 'Tellurique',
                'category' => 'planète',
                'size' => 4879,
                'distance' => 57.9,
                'gravity' => 3.7,
                'atmosphere' => 'Hélium, Oxygène, Sodium',
                'user_id' => 2,
            ],
            [
                'name' => 'Vénus',
                'type' => 'Tellurique',
                'category' => 'planète',
                'size' => 12104,
                'distance' => 108.2,
                'gravity' => 8.87,
                'atmosphere' => '96% CO₂, 3% N₂',
                'user_id' => 1,
            ],
            [
                'name' => 'Terre',
                'type' => 'Tellurique',
                'category' => 'planète',
                'size' => 12742,
                'distance' => 149.6,
                'gravity' => 9.8,
                'atmosphere' => '78% N₂, 21% O₂, 1% CO₂/Ar',
                'user_id' => 1,
            ],
            [
                'name' => 'Jupiter',
                'type' => 'Gazeuse',
                'category' => 'planète',
                'size' => 139820,
                'distance' => 778.5,
                'gravity' => 24.8,
                'atmosphere' => 'Hydrogène (90%), Hélium (10%)',
                'user_id' => 1,
            ],
            [
                'name' => 'Lune',
                'type' => 'Satellite naturel',
                'category' => 'satellite',
                'size' => 3474,
                'distance' => 0.384,
                'gravity' => 1.62,
                'atmosphere' => 'Trace : He, Ne, H₂',
                'user_id' => 1,
            ],
            [
                'name' => 'Xerion-5',
                'type' => 'Rocheuse exotique',
                'category' => 'exoplanète',
                'size' => 10300,
                'distance' => 9500,
                'gravity' => 11.3,
                'atmosphere' => 'Argon, Méthane, CO₂',
                'user_id' => 2,
            ],
            [
                'name' => 'Zebulon-9',
                'type' => 'Super-Terre',
                'category' => 'exoplanète',
                'size' => 16200,
                'distance' => 17300,
                'gravity' => 14.2,
                'atmosphere' => 'NH₃, CO, vapeur d’eau',
                'user_id' => 1,
            ],
        ];

        foreach ($planets as $planet) {
            Planet::create($planet);
        }
    }
}
