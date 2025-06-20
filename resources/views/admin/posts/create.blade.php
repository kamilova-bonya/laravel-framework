@extends('layouts.main')

@section('title', 'Создать пост')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <b>Добавить пост</b>

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <input type="text" name="title">
        <input type="text" name="content">
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Добавить">
    </form>
@endsection


