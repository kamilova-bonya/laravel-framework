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
            {{ $post->title }} [edit] [x]
        </div>
    @endforeach
@endsection


