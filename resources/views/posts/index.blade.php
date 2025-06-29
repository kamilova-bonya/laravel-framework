@extends('layouts.app')

@section('title', 'Посты')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Все посты</div>
                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="mb-2">
                            Категория: {{ $post->category->name }}
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


