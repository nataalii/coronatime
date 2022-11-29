<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
	use Queueable;

	public $token;

	public static $createUrlCallback;

	public static $toMailCallback;

	public function __construct($token)
	{
		$this->token = $token;
	}

	/**
	 * Get the notification's channels.
	 *
	 * @param mixed $notifiable
	 *
	 * @return array|string
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}

	/**
	 * Build the mail representation of the notification.
	 *
	 * @param mixed $notifiable
	 *
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		if (static::$toMailCallback)
		{
			return call_user_func(static::$toMailCallback, $notifiable, $this->token);
		}

		return $this->buildMailMessage($this->resetUrl($notifiable));
	}

	/**
	 * Get the reset password notification mail message for the given URL.
	 *
	 * @param string $url
	 *
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	protected function buildMailMessage($url)
	{
		return (new MailMessage)
					->view('notifications.reset-password', ['url' => $url]);
	}

	/**
	 * Get the reset URL for the given notifiable.
	 *
	 * @param mixed $notifiable
	 *
	 * @return string
	 */
	protected function resetUrl($notifiable)
	{
		if (static::$createUrlCallback)
		{
			return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
		}

		return url(route('password.reset', [
			'token' => $this->token,
			'email' => $notifiable->getEmailForPasswordReset(),
		], false));
	}

	/**
	 * Set a callback that should be used when creating the reset password button URL.
	 *
	 * @param  \Closure(mixed, string): string  $callback
	 *
	 * @return void
	 */
	public static function createUrlUsing($callback)
	{
		static::$createUrlCallback = $callback;
	}

	/**
	 * Set a callback that should be used when building the notification mail message.
	 *
	 * @param  \Closure(mixed, string): \Illuminate\Notifications\Messages\MailMessage  $callback
	 *
	 * @return void
	 */
	public static function toMailUsing($callback)
	{
		static::$toMailCallback = $callback;
	}
}
