<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Article
 */
class ArticleCrudController extends Controller
{
    public function index()
    {
        return 'hello world';
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Article $article)
    {

    }

    public function edit(Article $article)
    {

    }

    public function update(Request $request, Article $article)
    {

    }

    public function destroy(Article $article)
    {

    }
}