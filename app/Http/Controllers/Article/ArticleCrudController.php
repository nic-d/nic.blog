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
use App\Http\Repository\ArticleRepository;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Article
 */
class ArticleCrudController extends Controller
{
    /** @var ArticleRepository $articleRepository */
    private $articleRepository;

    /**
     * ArticleCrudController constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $articles = $this->articleRepository->getModel()::orderBy('id', 'desc')->paginate();
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
        $this->articleRepository->create($request->all());
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
        $this->articleRepository->update($article->id, $request->all());
        return redirect()->route('article.crud.edit', $article);
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $this->articleRepository->delete($article->id);
        return redirect()->route('article.crud.index');
    }
}