<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	/**
	 * @var array $tables DESCRIPTION
	 */
	private $tables =[
		'lesson_tag', 'lessons', 'tags'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->cleanDatabase();
        $this->call(UserTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }

	/**
	 * @author <sbow>
	 * @added on the 01/03/2016
	 */
	private function cleanDatabase()
	{
		foreach ($this->tables as $table){
			DB::statement("TRUNCATE $table CASCADE;");
		}
	}
}
