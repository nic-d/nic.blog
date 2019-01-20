@extends('layout')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-6">
            {{-- BLOG POSTS --}}
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-12">
                        <div class="post-preview">
                            <a href="">
                                <h2 class="post-title">
                                    Man must explore, and this is exploration at its greatest
                                </h2>
                                <h3 class="post-subtitle">
                                    Problems look mighty small from 150 miles up
                                </h3>
                            </a>

                            <p class="post-meta">Posted on January 19th, 2019</p>
                        </div>
                    </div>
                @endforeach

                {{ $articles->links() }}
            </div>
        </div>
    </div>
@stop