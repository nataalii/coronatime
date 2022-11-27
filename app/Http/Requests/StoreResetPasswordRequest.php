<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResetPasswordRequest extends FormRequest
{
	public function rules()
	{
		return [
			'token'    => 'required',
			'email'    => 'required|email',
			'password' => 'required|min:3|confirmed',
		];
	}
}
