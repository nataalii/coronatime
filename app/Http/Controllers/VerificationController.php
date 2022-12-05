<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
	public function show(Request $request)
	{
		$user = User::where('id', $request->id)->first();
		if (Hash::check($user->email, $request->email))
		{
			$user->email_verified_at = Carbon::now();
			$user->save();
		}

		return redirect(route('register.verify', app()->getLocale()));
	}
}
