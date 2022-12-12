<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::create([
			'username' => 'natali',
			'email'    => 'nata@rdbry.com',
			'password' => 'password',
		]);
	}

	public function test_redirect_to_login_page_if_not_authorized_on_worldwide_page()
	{
		$response = $this->get('{language}/statistics/worldwide', ['language' => app()->getLocale()]);
		$response->assertRedirect(route('login.create', app()->getLocale()));
	}

	public function test_redirect_to_login_page_if_not_authorized_on_by_country_page()
	{
		$response = $this->get('{language}/statistics/by-country', ['language' => app()->getLocale()]);
		$response->assertRedirect(route('login.create', app()->getLocale()));
	}

	public function test_visit_worldwide_page_successfully()
	{
		$response = $this->actingAs($this->user)->get(route('worldwide', ['language' => app()->getLocale()]));
		$response->assertSuccessful();
	}

	public function test_visit_by_country_page_successfully()
	{
		$response = $this->actingAs($this->user)->get(route('by-country', ['language' => app()->getLocale()]));
		$response->assertSuccessful();
	}
}
