<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_team()
    {
        // Give I am a user who is logged in
        $this->actingAs(User::factory()->create());

        $attributes = ['name' => 'Acme'];

        // When they hit the endpoint /teams to create a new team, while passing the necessaray data.
        $this->post('/teams', $attributes);

        // Then there should be a new team in the database.
        $this->assertDatabaseHas('teams', $attributes);
    }

    /** @test */
    public function guests_may_not_create_teams()
    {
        $this->post('/teams')->assertRedirect('/login');
    }
}
