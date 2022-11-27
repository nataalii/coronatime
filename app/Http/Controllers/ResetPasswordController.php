<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
	public function sendResetLink(Request $request)
	{
		$request->validate(['email' => 'required|email']);
		$status = Password::sendResetLink(
			$request->only('email')
		);
		return $status === Password::RESET_LINK_SENT
		? back()->with(['status' => __($status)])
		 : back()->withErrors(['email' => __($status)]);
	}

	public function showResetForm(Request $request, $token)
	{
		return view('auth.reset-password', [
			'email' => $request->email,
			'token' => $token,
		]);
	}

	public function resetPassword(StoreResetPasswordRequest $request)
	{
		$request->validated();
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
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
