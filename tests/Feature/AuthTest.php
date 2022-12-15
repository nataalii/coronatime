<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accsessable()
	{
		$response = $this->get('login.create', [app()->getLocale()]);
		$response->assertSuccessful();
		$response->assertViewIs('sessions.login');
	}

	public function test_auth_should_return_errors_if_input_is_not_provided()
	{
		$response = $this->post('login.create', [app()->getLocale()]);
		$response->assertSessionHasErrors(
			[
				'login',
				'password',
			]
		);
	}

	public function test_auth_should_return_password_error_if_password_input_is_not_provided()
	{
		$response = $this->post('login.create', [app()->getLocale()], [
			'login' => 'email-or-username',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_auth_should_return_login_error_if_login_input_is_not_provided()
	{
		$response = $this->post('login.create', [app()->getLocale()], [
			'login'    => '12324',
			'password' => 'password',
		]);
		$response->assertSessionHasErrors(
			[
				'login',
			]
		);
	}

	public function test_auth_should_return_login_error_if_login_input_is_less_than_three_characters()
	{
		$response = $this->post(route('login.create', [
			'language' => app()->getLocale(),
			'login'    => '12',
			'password' => 'password',
		]));
		$response->assertSessionHasErrors(
			[
				'login',
			]
		);
	}

	public function test_login_should_return_incorrect_credential_errors_if_such_user_does_not_exists()
	{
		$response = $this->post(route('login.create', ['language' => app()->getLocale(), 'login' =>'nata@123.com', 'password' => 'password']));
		$response->assertSessionHasErrors(['login' => __('text.inc_credentials'), 'password' => __('text.inc_credentials')]);
	}

	public function test_auth_should_redirect_to_verification_notice_if_email_is_not_verified()
	{
		$username = 'natali';
		$password = 'password';
		$user = User::create([
			'username' => $username,
			'email'    => 'natali@redberry.com',
			'password' => $password,
		]);
		$response = $this->post(route('login.create', [
			'language'          => app()->getLocale(),
			'login'             => $username,
			'password'          => $password,
			'email_verified_at' => null, ]));
		$response->assertStatus(302);
	}

	public function test_auth_should_redirect_to_worldwiide_after_success()
	{
		$email = 'nata@rdbry.com';
		$password = 'password';
		$user = User::create([
			'username'          => 'natali',
			'email'             => $email,
			'password'          => $password,
			'email_verified_at' => Carbon::now(),
		]);
		$response = $this->post(route('login.create', [
			'login'    => $email,
			'password' => $password,
			'language' => app()->getLocale(),
		]));
		$response->assertStatus(302);
	}

	public function test_auth_should_redirect_to_login_page_after_logout()
	{
		$user = User::create([
			'username' => 'natali',
			'email'    => 'nata@rdbry.com',
			'password' => 'password',
		]);

		$this->actingAs($user);
		$this->post(route('logout', ['language' =>app()->getLocale()]))->assertRedirect(route('login.create', app()->getLocale()));
	}
}
