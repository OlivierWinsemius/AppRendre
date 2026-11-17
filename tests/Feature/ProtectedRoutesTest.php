<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProtectedRoutesTest extends TestCase
{
    use RefreshDatabase;

    private const array PROTECTED_ROUTE_PREFIXES = ['dashboard', 'explore.'];

    public function test_protected_routes_require_a_verified_user(): void
    {
        $protectedRoutes = $this->protectedRoutes();

        $this->assertNotEmpty($protectedRoutes);

        foreach ($protectedRoutes as $route) {
            $this->assertContains('auth', $route->gatherMiddleware(), "Route [{$route->getName()}] is missing the auth middleware.");
            $this->assertContains('verified', $route->gatherMiddleware(), "Route [{$route->getName()}] is missing the verified middleware.");
        }
    }

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        foreach ($this->protectedRoutes() as $route) {
            $response = $this->call($route->methods()[0], $route->uri());

            $response->assertRedirectToRoute('login');
        }
    }

    public function test_unverified_users_are_redirected_to_the_email_verification_notice(): void
    {
        $user = User::factory()->unverified()->create();

        foreach ($this->protectedRoutes() as $route) {
            $response = $this->actingAs($user)->call($route->methods()[0], $route->uri());

            $response->assertRedirectToRoute('verification.notice');
        }
    }

    /**
     * @return Collection<int, RoutingRoute>
     */
    private function protectedRoutes(): Collection
    {
        return collect(Route::getRoutes()->getRoutes())
            ->filter(fn (RoutingRoute $route): bool => Str::startsWith($route->getName() ?? '', self::PROTECTED_ROUTE_PREFIXES))
            ->values();
    }
}
