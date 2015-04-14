<?php

class FormTest extends TestCase {

	/**
	 * Testing form page is not throwing an error
	 *
	 * @return void
	 */
	public function formGetTest()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Testing to make sure post is possible
	 * and not throwing an error
	 *
	 * @return void
	 */
	public function formPostTest()
	{
		$response = $this->call('POST', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}
}
