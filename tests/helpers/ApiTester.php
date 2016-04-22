<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;
use \App\Lesson;

/**
 * Class ApiTester DESCRIPTION
 * @added on the 28/01/2016
 * @author <sbow>
 * @package admin . megatransfert . ws . youpass . com . net . fr
 * @subpackage common.classes controllers
 * @copyright Youpass
 */
abstract class ApiTester extends TestCase{

	/**
	 * @var \Faker\Generator $fake DESCRIPTION
	 */
	protected $fake;

	/**
	 * ApiTester constructor.
	 */
	public function __construct(){

		$this->fake = Faker::create();
		
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 */
	public function setUp(){
		parent::setUp();
		Artisan::call('migrate');
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @param $uri
	 * @param string $method
	 * @param array $parameters
	 * @return mixed
	 */
	protected function getJson($uri, $method = 'GET', $parameters = [])
	{
		return json_decode($this->call($method, $uri, $parameters)->getContent());
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 */
	protected function assertObjectHasAttributes()
	{
		$args = func_get_args();
		$object = array_shift($args);

		foreach ($args as $attribute) {
			$this->assertObjectHasAttribute($attribute, $object);
		}
	}

	
}