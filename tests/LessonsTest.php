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