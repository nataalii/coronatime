<?php

namespace App\Http\Controllers;

use App\Models\Statistics;

class StatisticsController extends Controller
{
	public function dashboardInfo()
	{
		$worldwideData = Statistics::all();
		return view('dashboard.worldwide', [
			'worldwideData' => $worldwideData,
		]);
	}

	public function store()
	{
		$sort_column = $_GET['sort'] ?? 'name->' . app()->getLocale();
		$sort_order = $_GET['sort_direction'] ?? 'asc';
		$search_text = $_GET['query'] ?? '';
		$localCode = app()->getLocale();

		$countries = Statistics::where('name' . '->' . $localCode, 'LIKE', '%' . $search_text . '%')
				->orderBy($sort_column, $sort_order)
				->get();

		return view('dashboard.by-country', [
			'countries' => $countries,
		]);
	}
}
