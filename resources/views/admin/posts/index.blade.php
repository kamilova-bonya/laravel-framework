@extends('layouts.main')

@section('title', 'Посты crud')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <b>Все посты</b>
    <a href="{{ route('admin.posts.create') }}">Создать пост</a><br>
    @foreach($posts as $post)
        <div>
            {{ $post->title }}
            <a href="{{ route('admin.posts.edit', $post )}}">[edit]</a>
            <a href="{{ route('admin.posts.destroy' , $post) }}">[x]</a>
        </div>
    @endforeach
@endsection


