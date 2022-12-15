<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
	public function sendResetLink(StoreEmailRequest $request)
	{
		$request->validated();
		$status = Password::sendResetLink(
			$request->only('email')
		);
		return $status === Password::RESET_LINK_SENT
		? redirect(route('verification.notice', app()->getLocale()))
		 : back()->withErrors(['email' => __($status)]);
	}

	public function showResetForm(Request $request)
	{
		return view('auth.reset-password', [
			'email' => $request->email,
			'token' => $request->token,
		]);
	}

	public function resetPassword(StoreResetPasswordRequest $request)
	{
		$request->validated();
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => $password,
				])->setRememberToken(Str::random(60));
				$user->save();
				event(new PasswordReset($user));
			}
		);
		return $status === Password::PASSWORD_RESET
					? view('auth.update')->with('status', __($status))
					: back()->withErrors(['email' => [__($status)]]);
	}
}
