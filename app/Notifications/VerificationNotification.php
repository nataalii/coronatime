<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerificationNotification extends Notification
{
	use Queueable;

	use Notifiable;

	public static $createUrlCallback;

	public static $toMailCallback;

	public function via($notifiable)
	{
		return ['mail'];
	}

	public function toMail($notifiable)
	{
		$verificationUrl = $this->verificationUrl($notifiable);

		return $this->buildMailMessage($verificationUrl);
	}

	private function buildMailMessage($url)
	{
		return (new MailMessage)
			->subject(Lang::get('Verify Email Address'))
			->view('notifications.verify-email', ['url' => $url]);
	}

	private function verificationUrl($notifiable)
	{
		return URL::temporarySignedRoute(
			'verification.verify',
			Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
			[
				'language' => app()->getLocale(),
				'id'       => $notifiable->id,
				'email'    => Hash::make($notifiable->getEmailForVerification()),
				'hash'     => sha1($notifiable->getEmailForVerification()),
			]
		);
	}
}
