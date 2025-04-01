<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Planet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanetFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_planet()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/planets', [
            'name' => 'TerraNova',
            'type' => 'Tellurique',
            'category' => 'planète',
            'size' => 12742,
            'distance' => 150,
            'gravity' => 9.8,
            'atmosphere' => 'Azote, Oxygène',
        ]);

        $response->assertRedirect('/planets');
        $this->assertDatabaseHas('planets', ['name' => 'TerraNova']);
    }

    /** @test */
    public function planet_name_cannot_contain_inappropriate_words()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/planets', [
            'name' => 'grosmot',
            'type' => 'Gazeuse',
            'category' => 'planète',
            'size' => 50000,
            'distance' => 300,
            'gravity' => 20,
            'atmosphere' => 'Hydrogène',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function only_authenticated_users_can_create_planets()
    {
        $response = $this->post('/planets', [
            'name' => 'JupiterX',
            'type' => 'Gazeuse',
            'category' => 'planète',
            'size' => 139820,
            'distance' => 778,
            'gravity' => 24.79,
            'atmosphere' => 'Hydrogène, Hélium',
        ]);

        $response->assertRedirect('/login');
    }

    /** @test */
    public function admin_can_see_all_planets_and_users_on_dashboard()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->get('/dashboard')
            ->assertSee("Vue d'ensemble des planètes et utilisateurs");
    }

    /** @test */
    public function user_cannot_delete_other_users_planets()
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $planet = Planet::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($otherUser)->delete("/planets/{$planet->id}");

        $this->assertDatabaseHas('planets', ['id' => $planet->id]);
    }

    /** @test */
    public function planet_category_is_required_and_valid()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/planets', [
            'name' => 'NewPlanet',
            'type' => 'Tellurique',
            'category' => 'unknown',
            'size' => 10000,
            'distance' => 300,
            'gravity' => 10,
            'atmosphere' => 'Oxygène',
        ]);

        $response->assertSessionHasErrors('category');
    }
}
