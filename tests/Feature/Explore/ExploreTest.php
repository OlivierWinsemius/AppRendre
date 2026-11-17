<?php

namespace Tests\Feature\Explore;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ExploreTest extends TestCase
{
    use RefreshDatabase;

    public function test_verified_users_can_view_the_explore_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('explore.index'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('explore/index'));
    }
}
