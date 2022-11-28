<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email' => 'required|email',
		];
	}
}
