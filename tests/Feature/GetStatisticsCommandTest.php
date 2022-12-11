<?php

namespace Tests\Feature;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetStatisticsCommandTest extends TestCase
{
	use RefreshDatabase;

	protected function setUp(): void
	{
		parent::setUp();

		$this->country1 = [
			'code'      => 'AF',
			'name'      => ['en'=> 'Afghanistan', 'ka' => 'ავღანეთი'],
		];

		$this->country2 = [
			'code'      => 'AL',
			'name'      => ['en'=> 'Albania', 'ka' => 'ალბანეთი'],
		];
	}

	public function test_get_statistics_information_successfully()
	{
		$schedule = app()->make(Schedule::class);
		$events = collect($schedule->events())->filter(function (Event $event) {
			return stripos($event->command, 'coronatime:get-statistics');
		});

		$events->each(function (Event $event) {
			$this->assertEquals('0 0 * * *', $event->expression);
		});

		$data = ([$this->country1, $this->country2]);
		Http::fake([
			'https://devtest.ge/countries*' => Http::response($data),
		]);
		$this->artisan('coronatime:get-statistics')->expectsOutput('Data successfully fetched');
	}
}
