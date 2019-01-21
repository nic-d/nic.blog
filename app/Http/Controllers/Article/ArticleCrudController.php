<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArticleRequest;
use Illuminate\Contracts\View\Factory;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Article
 */
class ArticleCrudController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $articles = Article::paginate();
        return view('article.crud.index', compact('articles'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('article.crud.create');
    }

    /**
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        return redirect()->route('article.crud.index');
    }

    /**
     * @param Article $article
     * @return Factory|View
     */
    public function edit(Article $article)
    {
        return view('article.crud.edit', compact('article'));
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('article.crud.edit', $article);
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.crud.index');
    }
}