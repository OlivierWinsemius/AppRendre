<?php

namespace Tests\Feature\Explore;

use App\Enums\LanguageCode;
use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ExploreTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('explore.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_unverified_users_are_redirected_to_the_email_verification_notice(): void
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get(route('explore.index'));

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_verified_users_see_every_language_code(): void
    {
        $user = User::factory()->create();
        Language::create(['code' => LanguageCode::English]);
        Language::create(['code' => LanguageCode::French]);

        $response = $this->actingAs($user)->get(route('explore.index'));

        $response->assertOk();
        $response->assertInertia(fn (Assert $page) => $page
            ->component('explore/index')
            ->has('languages', 2)
        );
        $this->assertEqualsCanonicalizing(['en', 'fr'], $response->inertiaProps('languages'));
    }

    public function test_verified_users_see_an_empty_language_list_when_no_languages_exist(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('explore.index'));

        $response->assertOk();
        $response->assertInertia(fn (Assert $page) => $page
            ->component('explore/index')
            ->where('languages', [])
        );
    }
}
