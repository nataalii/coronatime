<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
	public function store(StoreUserRequest $request)
	{
		$validated = $request->validated();

		$user = User::create($validated);
		event(new Registered($user));
		$user->save();

		return redirect(route('verification.notice'));
	}
}
