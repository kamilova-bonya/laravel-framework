@extends('layouts.main')

@section('title', 'Посты')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <b>Все посты</b>

    @foreach($posts as $post)
        <div>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>
    @endforeach
@endsection


