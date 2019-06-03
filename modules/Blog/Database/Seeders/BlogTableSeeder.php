<?php namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(PostsTableSeeder::class);
	}

}