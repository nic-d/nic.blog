@extends('layout')
@section('title', 'Blog')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-6">
            @if ($articles->total() <= 0)
                <h3 class="text-muted text-center">Nothing Here.</h3>
            @else
                {{-- BLOG POSTS --}}
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-12">
                            <div class="post-preview">
                                <a href="{{ route('article.show', $article->slug) }}">
                                    <h2 class="post-title">{{ $article->title }}</h2>
                                </a>

                                <p class="post-meta">Posted on {{ date('F m, Y', strtotime($article->created_at)) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            {{ $articles->links() }}
        </div>
    </div>
@stop