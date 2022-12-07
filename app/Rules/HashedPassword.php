<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class HashedPassword implements Rule
{
	public function passes($attribute, $value)
	{
		$user = User::where('username', request()->login)->orWhere('email', request()->login)->first();
		if ($user && Hash::check($value, $user->password))
		{
			return true;
		}
	}

	public function message()
	{
		return __('text.inc_credentials');
	}
}
