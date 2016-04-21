<?php

use App\Lesson;

class LessonsTest extends ApiTester {

	/**
	 * @test
	 */
	public function it_fetches_lessons()
	{
		//arrange
		$this->times(5)->makeLesson();

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
		$this->times(5)->makeLesson();

		//act
		$lesson = $this->getJson('api/v1/lessons/1')->data;

		//assert
		$this->assertResponseOk();
		$this->assertObjectHasAttributes($lesson, 'title', 'body');
	}

	/**  @test */
	public function it_404s_when_route_is_wrong(){
		$this->getJson('api/v1/lessons/x/x');
		$this->assertResponseStatus(404);
	}

	private function makeLesson($lessonFields = [])
	{
		$lesson = array_merge([
			'title' => $this->fake->sentence(),
			'body' => $this->fake->paragraph(),
			'some_bool' => $this->fake->boolean
		], $lessonFields);

		while ($this->times--) Lesson::create($lesson);
	}

}