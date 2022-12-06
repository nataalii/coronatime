<?php

namespace App\Http\Requests\user;

use App\Models\User;
use App\Rules\ExistsInDatabase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreSessionsRequest extends FormRequest
{
	public function rules()
	{
		return [
			'login'              => ['required', 'min:3', new ExistsInDatabase],
			'password'           => [
				'required',
				function ($attribute, $value, $fail) {
					$user = User::where('username', request()->login)->orWhere('email', request()->login)->first();
					$user && Hash::check($value, $user->password) ? true : $fail(__('text.inc_credentials'));
				},
			],
		];
	}
}
