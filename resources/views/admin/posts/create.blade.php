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
        <input type="text" name="category_id" value="1">
        <input type="submit" value="Добавить">
    </form>
@endsection


