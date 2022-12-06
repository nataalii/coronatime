<?php

namespace App\Http\Requests\user;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreSessionsRequest extends FormRequest
{
	public function rules()
	{
		return [
			'login'                      => [
				'required',
				'min:3',
				function ($attribute, $value, $fail) {
					$field_type = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
					if (!DB::table('users')->where('username', $value)->orWhere('email', $value)->exists())
					{
						return $fail(__('text.inc_credentials'));
					}
				},
			],

			'password'                   => [
				'required',
				function ($attribute, $value, $fail) {
					$username_check = User::where('username', request()->login)->first();
					$email_check = User::where('email', request()->login)->first();
					($username_check && Hash::check($value, $username_check->password) ||
					 $email_check && Hash::check($value, $email_check->password)) ? true : $fail(__('text.inc_credentials'));
				},
			],
		];
	}
}
