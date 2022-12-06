<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreSessionsRequest;
use App\Models\User;

class SessionsController extends Controller
{
	public function store(StoreSessionsRequest $request)
	{
		$login = $request->input('login');
		$field_type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$field_type => $request->input('login')]);
		$user = User::where($field_type, request()->login)->first();

		if ($user && $user->hasVerifiedEmail() && auth()->attempt($request->only([$field_type, 'password']), $user->remember_me))
		{
			session()->regenerate();
			return redirect(route('worldwide', app()->getLocale()));
		}
		elseif (auth()->attempt($request->only([$field_type, 'password']), $request->remember_me) && !$user->hasVerifiedEmail())
		{
			auth()->logout();
			return redirect()->route('verification.notice', app()->getLocale());
		}
	}

	public function destroy()
	{
		auth()->logout();
		return redirect()->route('login.create', app()->getLocale());
	}
}
