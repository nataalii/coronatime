<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsInDatabase implements Rule
{
	public function passes($attribute, $value)
	{
		$field_type = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		if (DB::table('users')->where('username', $value)->orWhere('email', $value)->exists())
		{
			return true;
		}
	}

	public function message()
	{
		return  __('text.inc_credentials');
	}
}
