<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreSessionsRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function store(StoreSessionsRequest $request)
	{
		$user = User::where('username', $request->username)->first();
		$isPasswordTrue = Hash::check($request->password, $user->password);

		if ($user->hasVerifiedEmail() && auth()->attempt($request->only(['username', 'password']), $request->remember_me) && $isPasswordTrue)
		{
			session()->regenerate();
			return redirect(route('worldwide'));
		}
		throw ValidationException::withMessages([
			'password'    => __('Enter Valid Password'),
		]);
	}

	public function destroy()
	{
		auth()->logout();
		return redirect()->route('login.create');
	}
}
