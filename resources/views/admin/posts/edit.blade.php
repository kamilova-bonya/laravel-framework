@extends('layouts.main')

@section('title', 'Изменить пост')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <b>Изменить пост</b>

    <form action="{{ route('admin.posts.update', $post) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}">
        <input type="text" name="content" value="{{ $post->content }}">
        <select name="category_id">
            @foreach($categories as $category)
                <option @if ($category->id == $post->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Изменить">
    </form>
@endsection
