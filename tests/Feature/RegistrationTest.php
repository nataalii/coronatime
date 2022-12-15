<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\VerificationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	use Notifiable;

	public static $createUrlCallback;

	public static $toMailCallback;

	public function test_register_page_is_accsessable()
	{
		$response = $this->get(route('register.create', [app()->getLocale()]));
		$response->assertSuccessful();
		$response->assertViewIs('register.create');
	}

	public function test_register_should_return_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('register.create', [app()->getLocale()]));
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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

		$response = $this->post(route('register.create', [app()->getLocale()]), [
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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

		$response = $this->post(route('register.create', [app()->getLocale()]), [
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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
		$response = $this->post(route('register.create', [app()->getLocale()]), [
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

	public function test_verification_email()
	{
		Notification::fake();

		$response = $this->post(route('register.create', [app()->getLocale()]), [
			'username'              => 'natalia',
			'email'                 => 'natali@redberry.com',
			'password'              => 'nata1234',
			'password_confirmation' => 'nata1234',
		]);

		$user = User::find(1);
		$user->notify(new VerificationNotification($user->getEmailForVerification()));
		Notification::assertSentTo($user, VerificationNotification::class, function ($notification) use ($user) {
			$notification->toMail($user);
			return true;
		});

		$this->get(route('verification.verify', [
			'language' => app()->getLocale(),
			'id'       => 1,
			'email'    => Hash::make($user->email),
			'hash'     => 'hash',
		]))->assertRedirect(route('register.verify', app()->getLocale()));
	}

	public function test_register_should_store_new_user()
	{
		$response = $this->post(route('register.create', [app()->getLocale()]), [
			'username'              => 'natalia',
			'email'                 => 'natali@redberry.com',
			'password'              => 'nata1234',
			'password_confirmation' => 'nata1234',
		]);

		$response->assertRedirectToRoute('verification.notice', ['language' =>app()->getLocale()]);
	}
}
