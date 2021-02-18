<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 5; $i++) { 
            $post = new Post;

            $post->title = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $post->subtitle = $faker->sentence($nbWords = 10, $variableNbWords = true);
            $post->author = $faker->name();
            $post->text = $faker->realText(500);
            $post->publication_date = $faker->dateTime($max = 'now', $timezone = 'GMT');
            $post->save();
        }
        
    }
}
