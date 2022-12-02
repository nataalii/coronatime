<?php

namespace App\Http\Controllers;

use App\Models\Statistics;

class StatisticsController extends Controller
{
	public function store()
	{
		return view('dashboard.by-country', [
			'countries' => Statistics::all(),
		]);
	}
}
