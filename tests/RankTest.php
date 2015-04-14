<?php

class RankTest extends TestCase {

	/**
	 * Testing rank page is not throwing an errors
	 *
	 * @return void
	 */
	public function rankGetTest()
	{
		$response = $this->call('GET', '/rank');

		$this->assertEquals(200, $response->getStatusCode());
	}
}
