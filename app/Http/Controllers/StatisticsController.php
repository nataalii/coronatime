<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
	public function dashboardInfo()
	{
		$worldwideData = Statistic::all();
		return view('dashboard.worldwide', [
			'worldwideData' => $worldwideData,
		]);
	}

	public function store()
	{
		$sort_column = $_GET['sort'] ?? 'name->' . app()->getLocale();
		$sort_order = $_GET['sort_direction'] ?? 'asc';
		$search_text = $_GET['query'] ?? '';

		$countries = Statistic::where(DB::raw('lower(name)'), 'LIKE', '%' . $search_text . '%')
				->orderBy($sort_column, $sort_order)
				->get();

		return view('dashboard.by-country', [
			'countries' => $countries,
		]);
	}
}
