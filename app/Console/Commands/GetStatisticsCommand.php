<?php

namespace App\Console\Commands;

use App\Models\Statistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetStatisticsCommand extends Command
{
	protected $signature = 'statistics:get';

	protected $description = 'This command fetches api and seeds statistics table in database ';

	public function handle()
	{
		$api_url = 'https://devtest.ge/countries';
		$response = Http::get($api_url);
		$data = json_decode($response->body());

		foreach ($data as $country)
		{
			$country = (array)$country;
			$name = ['en' => $country['name']->en, 'ka' => $country['name']->ka];

			$statistics_response = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			]);

			$statistics = json_decode($statistics_response->body());
			$statistics = (array)$statistics;

			Statistics::updateOrCreate(
				[
					'code'      => $country['code'],
					'name'      => json_encode($name),
					'confirmed' => $statistics['confirmed'],
					'deaths'    => $statistics['deaths'],
					'recovered' => $statistics['recovered'],
				]
			);
		}

		$this->info('Data successfully fetched');
	}
}
