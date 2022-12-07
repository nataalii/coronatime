<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accsessable()
	{
		$response = $this->get(app()->getLocale() . ('/register'));
		$response->assertSuccessful();
		$response->assertViewIs('register.create');
	}

	public function test_register_should_return_errors_if_input_is_not_provided()
	{
		$response = $this->post(app()->getLocale() . ('/register'));
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
			]
		);
	}

	public function test_register_should_return_username_error_if_username_input_is_not__provided()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'email'                 => 'nata@redberry.com',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_register_should_return_username_error_if_username_input_is_less_than_three_characters()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'na',
			'email'                 => 'nata@redberry.com',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_resgister_should_return_username_error_if_username_input_is_not_unique()
	{
		$name = 'natali';
		$password = 'password';
		User::create([
			'username' => $name,
			'email'    => 'test1@redberry.ge',
			'password' => bcrypt($password),
		]);

		$response = $this->post('{language}/register', [
			'username'              => $name,
			'email'                 => 'test2@redberry.ge',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);

		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_register_should_return_email_error_if_email_input_is_not_provided()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'nata',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_resgister_should_return_email_error_if_email_input_is_not_unique()
	{
		$email = 'nata@redberry.com';
		$password = 'password';
		User::create([
			'username' => 'natali',
			'email'    => $email,
			'password' => bcrypt($password),
		]);

		$response = $this->post('{language}/register', [
			'username'              => 'natalia',
			'email'                 => $email,
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_register_should_return_password_error_if_password_and_password_confirmation_is_not_provided()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'nata',
			'email'                 => 'nata@redberry.com',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_register_should_return_password_error_if_password_and_password_confirmation_is_less_than_three_characters()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'natali',
			'email'                 => 'nata@redberry.com',
			'password'              => '12',
			'password_confirmation' => '12',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_register_should_return_password_error_if_password_and_password_confirmation_do_not_match()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'natali',
			'email'                 => 'nata@redberry.com',
			'password'              => '1234',
			'password_confirmation' => '1244',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_register_should_store_new_user()
	{
		$response = $this->post(app()->getLocale() . ('/register'), [
			'username'              => 'Natalia',
			'email'                 => 'natali@redberry.com',
			'password'              => 'nata1234',
			'password_confirmation' => 'nata1234',
		]);

		$response->assertRedirectToRoute('verification.notice', ['language' =>app()->getLocale()]);
	}
}
