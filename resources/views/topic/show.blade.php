@extends('layout')
@section('title', 'Blog')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-6">
            {{-- BLOG POSTS --}}
            {{--<div class="row">--}}
                {{--@foreach($articles as $article)--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="post-preview">--}}
                            {{--<a href="{{ route('article.show', $article->slug) }}">--}}
                                {{--<h2 class="post-title">{{ $article->title }}</h2>--}}
                            {{--</a>--}}

                            {{--<p class="post-meta">Posted on {{ date('F m, Y', $article->created_at->timestamp) }}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
        </div>
    </div>
@stop