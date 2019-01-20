<?php

use App\Article;
use Illuminate\Database\Seeder;

/**
 * Class ArticlesSeeder
 */
class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 20)->create()->each(function ($article) {
            $article->save();
        });
    }
}