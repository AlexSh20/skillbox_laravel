<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(2)->create();
         \App\Models\Tag::factory(5)->create();
         \App\Models\Article::factory(20)->create();

        for ($i = 1; $i <= 100; $i++) {
            $articleId = Article::all('id')->random()->id;
            $tagId = Tag::all('id')->random()->id;
            $articlesTags = Article::where('id', $articleId)->first()->tags()->get();

            if(!$articlesTags->contains($tagId)){
                DB::table('tag_article')->insert([
                    'article_id' => $articleId ,
                    'tag_id' => $tagId,
                ]);
            }
        }

    }
}
