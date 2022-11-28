<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
	public function show(EmailVerificationRequest $request)
	{
		$request->email_verified_at = Carbon::now();
		$request->fulfill();

		return view('register.verify');
	}
}
