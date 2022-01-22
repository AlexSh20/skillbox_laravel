<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        News::factory(20)->create();
        User::factory(2)->create();
        Article::factory(20)->create();
        $this->call(ArticleTableSeeder::class);
    }
}

