@extends('layout')
@section('title', 'CRUD')

@section('content')
    @include('article.crud.partial._navigation')
    
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ date('F m, Y', $article->created_at->timestamp) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('article.show', $article->slug) }}" class="btn btn-secondary">View</a>
                                    <a href="{{ route('article.crud.edit', $article) }}" class="btn btn-secondary">Edit</a>

                                    <form action="{{ route('article.crud.destroy', $article) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            {{ $articles->links() }}
        </div>
    </div>
@stop