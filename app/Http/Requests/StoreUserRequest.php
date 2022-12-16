<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'                  => 'required|min:3|unique:users,username',
			'email'                     => 'required|email:dns|unique:users,email',
			'password'                  => 'required|min:3|confirmed',
		];
	}
}
