@extends('layouts.main')

@section('title', 'Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <b>Все категории</b>

    @foreach($categories as $category)
        <div>
            <a href="{{ route('posts.categories.show', $category->id ) }}">{{ $category->name }}</a>
        </div>
    @endforeach
@endsection

