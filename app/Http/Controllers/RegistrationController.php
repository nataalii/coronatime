<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserStoreRequest;
use App\Models\User;

class RegistrationController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store(UserStoreRequest $request)
	{
		$validated = $request->validated();

		User::create($validated);

		return redirect()->route('registration.confirm');
	}

	public function confirm()
	{
		return view('register.confirm');
	}
}
