<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            "viaggi",
            "moda",
            "food",
            "cinema"
        ];

        foreach ($tags as $tag) {
            //nuova istanza
            $newTag = new Tag();

            //proprietà
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();
        }
    }
}
