<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_guest_can_open_the_login_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('data-login-form', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false);

        $this->get('/login')->assertOk();
    }

    public function test_login_requires_email_and_password(): void
    {
        $this->post('/login')
            ->assertSessionHasErrors(['email', 'password']);
    }

    public function test_login_rejects_an_invalid_email_address(): void
    {
        $this->post('/login', [
            'email' => 'not-an-email',
            'password' => 'password',
        ])->assertSessionHasErrors('email');
    }

    public function test_login_rejects_non_string_credentials(): void
    {
        $this->post('/login', [
            'email' => ['user@example.com'],
            'password' => ['password'],
        ])->assertSessionHasErrors(['email', 'password']);
    }

    public function test_login_rejects_an_email_longer_than_the_database_column(): void
    {
        $this->post('/login', [
            'email' => str_repeat('a', 244).'@example.com',
            'password' => 'password',
        ])->assertSessionHasErrors('email');
    }

    public function test_login_rejects_incorrect_credentials(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'incorrect-password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_is_throttled_after_five_attempts_for_the_same_email_and_ip(): void
    {
        foreach (range(1, 5) as $attempt) {
            $this->post('/login', [
                'email' => 'unknown@example.com',
                'password' => 'incorrect-password',
            ])->assertRedirect();
        }

        $this->post('/login', [
            'email' => 'unknown@example.com',
            'password' => 'incorrect-password',
        ])->assertTooManyRequests();
    }

    public function test_user_can_log_in_and_reach_the_intended_dashboard(): void
    {
        $user = User::factory()->create();

        $this->withSession(['url.intended' => route('dashboard')])
            ->post('/login', [
                'email' => $user->email,
                'password' => 'password',
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);

        $this->get(route('dashboard'))->assertOk();
    }

    public function test_successful_login_regenerates_the_session_id(): void
    {
        $user = User::factory()->create();

        $this->get('/login');
        $previousSessionId = session()->getId();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertNotSame($previousSessionId, session()->getId());
    }

    public function test_guest_is_redirected_from_the_dashboard_to_login(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_open_the_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Dashboard Utama')
            ->assertSee($user->name);
    }

    public function test_user_can_log_out_and_the_session_is_cleared(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->withSession(['sensitive-value' => 'must be removed'])
            ->post(route('logout'))
            ->assertRedirect(route('login'))
            ->assertSessionMissing('sensitive-value');

        $this->assertGuest();
    }

    public function test_guest_cannot_log_out(): void
    {
        $this->post(route('logout'))
            ->assertRedirect(route('login'));
    }
}
