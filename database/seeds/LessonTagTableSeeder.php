<?php

use App\Lesson;
use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LessonTagTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		$lessonIds = Lesson::lists('id')->toArray();
		$tagIds = Tag::lists('id')->toArray();

		foreach(range(1,10) as $index)
		{
			DB::table('lesson_tag')->insert([
				'lesson_id' => $faker->randomElement($lessonIds),
				'tag_id' => $faker->randomElement($tagIds)
			]);

		}
	}
}
