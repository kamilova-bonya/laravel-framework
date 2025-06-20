@extends('layouts.main')

@section('title', 'Пост')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        Категория {{ $post->category->name }}<br>
        <b>{{ $post->title }}  </b>
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection



