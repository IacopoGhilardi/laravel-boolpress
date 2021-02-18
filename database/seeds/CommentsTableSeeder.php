<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        // $posts = Post::all();
        //prendo solo la colonna degli id
        $posts = Post::select('id')->get();
        
        foreach ($posts as $post) {

            for ($i=0; $i < 10; $i++) { 
                //creo l'istanza
                $comment = new Comment();
                //valorizzo i parametri
                $comment->post_id = $post->id;
                $comment->author = $faker->name();
                $comment->text = $faker->realText(500);
                $comment->save();
            }

        }
    }
}
