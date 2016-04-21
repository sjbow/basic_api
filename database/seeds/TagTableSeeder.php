<?php

use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();

		foreach(range(1,10) as $index)
		{
			Tag::create([
				'name' => $faker->word()
			]);

		}
    }
}
