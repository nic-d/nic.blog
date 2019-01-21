@extends('layout')
@section('title', 'CRUD')

@section('content')
    @include('article.crud.partial._navigation')

    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('article.crud.update', $article) }}" method="post">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                </div>

                <div class="form-group">
                    <label for="markdown">Markdown</label>
                    <textarea class="form-control" name="markdown" id="markdown" cols="30" rows="15">{{ $article->markdown }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop