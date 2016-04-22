<?php

use App\Lesson;
use App\Tag;

/**
 * Class LessonsTest DESCRIPTION
 * @added on the 28/01/2016
 * @author <sbow>
 * @package admin . megatransfert . ws . youpass . com . net . fr
 * @subpackage common.classes controllers
 * @copyright Youpass
 */
class LessonsTest extends ApiTester {

	use Factory;

	/**
	 * @test
	 */
	public function it_fetches_lessons()
	{
		//arrange
		$this->times(5)->make('Lesson');

		//act
		$this->getJson('api/v1/lessons');

		//assert
		$this->assertResponseOk();

	}

	/**
	 * @test
	 */
	public function it_fetches_a_single_lesson(){
		//arrange
		$this->times(5)->make('Lesson');

		//act
		$lesson = $this->getJson('api/v1/lessons/1')->data;

		//assert
		$this->assertResponseOk();
		$this->assertObjectHasAttributes($lesson, 'title', 'body');
	}

	/**  @test */
	public function it_404s_when_route_is_wrong(){

		//act
		$this->getJson('api/v1/lessons/x/x');

		//assert
		$this->assertResponseStatus(404);
	}
	
	/** @test */
	public function it_throws_a_401_if_the_credentials_are_wrong()
	{
		//act
		$this->getJson('api/v1/lessons', 'POST', $this->getStub());

		//assert
		$this->assertResponseStatus(401);
	}

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 * @return array
	 */
	public function getStub(){
		return [
			'title' => $this->fake->sentence(),
			'body' => $this->fake->paragraph(),
			'some_bool' => $this->fake->boolean
		];
	}


}