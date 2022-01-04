<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use function PHPUnit\TestFixture\func;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(2)->create();

        Article::factory()
            ->count(5)
            ->hasAttached($tags)
            ->has(Tag::factory()->count(2))
            ->create();
    }
}
