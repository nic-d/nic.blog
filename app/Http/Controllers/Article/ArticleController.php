<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Article
 */
class ArticleController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $articles = Article::paginate();
        return view('article/index', compact('articles'));
    }

    /**
     * @param Article $article
     * @return Factory|View
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
}