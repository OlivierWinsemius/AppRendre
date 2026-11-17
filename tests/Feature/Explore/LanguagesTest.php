<?php

namespace Tests\Feature\Explore;

use App\Enums\LanguageCode;
use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class LanguagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_verified_users_see_every_language_code(): void
    {
        $user = User::factory()->create();
        Language::create(['code' => LanguageCode::English]);
        Language::create(['code' => LanguageCode::French]);

        $response = $this->actingAs($user)->get(route('explore.languages'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page
            ->component('explore/languages/index')
            ->has('languages', 2)
        );

        $this->assertEqualsCanonicalizing(['en', 'fr'], $response->inertiaProps('languages'));
    }

    public function test_verified_users_see_an_empty_language_list_when_no_languages_exist(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('explore.languages'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page
            ->component('explore/languages/index')
            ->where('languages', [])
        );
    }
}
