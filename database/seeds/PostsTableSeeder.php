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
            $post->title = $faker->name;
            $post->text = $faker->realText(2000);
            $post->save();
        }
        
    }
}
