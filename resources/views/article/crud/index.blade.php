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
                                    <a href="" class="btn btn-secondary">View</a>
                                    <a href="" class="btn btn-secondary">Edit</a>
                                    <a href="" class="btn btn-secondary">Delete</a>
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