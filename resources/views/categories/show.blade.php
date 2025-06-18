@extends('layouts.main')

@section('title', 'Посты категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <b>Посты категории {{ $category->name }}</b>

    @foreach($posts as $post)
        <div>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>
    @endforeach
@endsection
