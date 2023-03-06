<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_have_a_team()
    {
        $user = User::factory()->create();

        $user->team()->create(['name' => 'Acme']);

        $this->assertEquals('Acme', $user->team->name);        
    }
}
