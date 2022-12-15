<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	use WithFaker;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::create([
			'username' => 'natali',
			'email'    => 'nata@rdbry.com',
			'password' => 'password',
		]);

		Notification::fake();
	}

	public function test_reset_password_should_sent_reset_email_if_email_is_correct()
	{
		Notification::fake();
		$this
			->followingRedirects()
			->from(route('password.request', ['language' => app()->getLocale()]))
			->post(route('password.email', ['language' => app()->getLocale()]), [
				'email' => $this->user->email,
			])
			->assertSuccessful()
			->assertSee(__('passwords.sent'));

		$token = Password::createToken($this->user);

		$user = User::find(1);
		$notification = new ResetPasswordNotification($token);
		Notification::assertSentTo($user, ResetPasswordNotification::class, function ($notification) use ($token, $user) {
			$notification->toMail($user);
			$notification->resetUrl($user);
			$notification->createUrlUsing($user);
			$notification->toMailUsing($user);

			return true;
		});
	}

	public function test_reset_password_should_redirect_to_password_reset_page_after_success()
	{
		$token = Password::createToken($this->user);
		$this
			->get(route('password.reset', [
				'token'    => $token,
				'language' => app()->getLocale(),
			]))
			->assertSuccessful()
		->assertSee(__('text.save_changes'));
	}

	public function test_reset_password_should_update_password_aftere_succsess()
	{
		$token = Password::createToken($this->user);

		$password = 'password1';

		$response = $this
			->post(route('password.update', [
				'language'              => app()->getLocale(),
				'token'                 => $token,
				'email'                 => $this->user->email,
				'password'              => $password,
				'password_confirmation' => $password,
			]))->assertStatus(200);
	}
}
