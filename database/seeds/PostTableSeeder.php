<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//這是用Model的語法
    	\App\Post::truncate();

    	//這是使用比較正規的語法
    	//DB::table('posts')->truncate();
    	
    	$faker = \Faker\Factory::create('zh_TW');

        foreach (range(1, 30) as $number) {
        	\App\Post::create([
        		'title' => $faker->realText(rand(10, 20)),
        		'content' => $faker->realText(),
        		'is_feature' => rand(0, 1),
        		'created_at' => \Carbon\Carbon::now() -> subDays($number),
        		'updated_at' => \Carbon\Carbon::now() -> subDays($number),
        	]);
        }
    }
}
