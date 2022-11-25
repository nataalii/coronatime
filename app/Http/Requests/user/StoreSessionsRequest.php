<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionsRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'                   => 'required|exists:users,username',
			'password'                   => 'required',
		];
	}
}
