<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use League\CommonMark\ConverterInterface;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Article
 */
class ArticleController extends Controller
{
    /** @var ConverterInterface $converter */
    private $converter;

    /**
     * ArticleController constructor.
     * @param ConverterInterface $converter
     */
    public function __construct(ConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate();
        return view('article/index', compact('articles'));
    }

    /**
     * @param string $slug
     * @return Factory|View
     */
    public function show(string $slug)
    {
        /** @var Article $article */
        $article = Article::where('slug', $slug)->first();

        if (is_null($article)) {
            abort(404);
        }

        return view('article.show', [
            'article' => $article,
            'markdown' => $this->converter->convertToHtml($article->markdown),
        ]);
    }
}