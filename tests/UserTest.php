<?php
#Ref: http://culttt.com/2013/05/20/getting-started-with-testing-laravel-4-models/
class TestCase extends Illuminate\Foundation\Testing\TestCase {
//class FormTest extends TestCase {
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

    /**
     * Login as User
     */
    public funciton loginUser()
    {
        $user = new User(array('name' => 'Alice'));

        $this->be($user);
    }

    /**
     * Username is required
     */
    public function testUsernameIsRequired()
    {
        // Create a new User
        $user = new User;
        $user->email = "name@domain.com";
        $user->password = "password";
        $user->password_confirmation = "password";
 
        // User should not save
        $this->assertFalse($user->save());
 
        // Save the errors
        $errors = $user->errors()->all();
 
        // There should be 1 error
        $this->assertCount(1, $errors);
 
        // The username error should be set
        $this->assertEquals($errors[0], "The username field is required.");
    } 


    /**
     * Default preparation for each test
     */
    public function setUp()
    {
        parent::setUp();
  
        $this->prepareForTests();
    }
  
    /**
     * Creates the application.
     *
     * @return Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
  
        $testEnvironment = 'testing';
  
        return require __DIR__.'/../../start.php';
    }
  
    /**
     * Migrate the database
     */
    private function prepareForTests()
    {
        Artisan::call('migrate');
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
/*    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

}*/
