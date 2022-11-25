<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreSessionsRequest;

class SessionsController extends Controller
{
	public function store(StoreSessionsRequest $request)
	{
		if (auth()->attempt($request->validated()))
		{
			session()->regenerate();

			return redirect(route('worldwide'));
		}
	}

	public function destroy()
	{
		auth()->logout();
		return redirect()->route('login.create');
	}
}
