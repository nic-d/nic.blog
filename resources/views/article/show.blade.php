@extends('layout')
@section('title', $article->title)

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">{{ $article->title }}</h1>
                    <h6 class="card-subtitle mb-2 text-muted text-center">
                        Posted On: {{ date('F m, Y', $article->created_at->timestamp) }}
                    </h6>
                </div>

                <div class="card-body">
                    {!! $markdown !!}
                </div>
            </div>
        </div>
    </div>
@stop