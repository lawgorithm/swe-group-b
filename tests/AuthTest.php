<?php

class AuthTest extends TestCase {

	/**
	 * Testing rank page is not throwing an errors
	 *
	 * @return void
	 */
	public function registerGetTest()
	{
		$response = $this->call('GET', '/auth/register');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function loginGetTest()
	{
		$response = $this->call('GET', '/auth/login');

		$this->assertEquals(200, $response->getStatusCode());
	}
}
