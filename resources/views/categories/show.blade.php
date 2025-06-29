@extends('layouts.app')

@section('title', 'Посты категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Посты категории {{ $category->name }}</div>
                <div class="card-body">
                    @foreach($category->posts as $post)
                        <div class="mb-2">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


