<?php

namespace App\Http\Controllers\Article;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use League\CommonMark\ConverterInterface;
use App\Http\Repository\ArticleRepository;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Article
 */
class ArticleController extends Controller
{
    /** @var ConverterInterface $converter */
    private $converter;

    /** @var ArticleRepository $articleRepository */
    private $articleRepository;

    /**
     * ArticleController constructor.
     * @param ConverterInterface $converter
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ConverterInterface $converter,
        ArticleRepository $articleRepository
    )
    {
        $this->converter = $converter;
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $articles = $this->articleRepository->getModel()::orderBy('id', 'desc')->paginate();
        return view('article/index', compact('articles'));
    }

    /**
     * @param string $slug
     * @return Factory|View
     */
    public function show(string $slug)
    {
        $article = $this->articleRepository->findOneBy('slug', $slug);

        if (is_null($article)) {
            abort(404);
        }

        return view('article.show', [
            'article' => $article,
            'markdown' => $this->converter->convertToHtml($article->markdown),
        ]);
    }
}