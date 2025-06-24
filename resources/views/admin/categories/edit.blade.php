@extends('layouts.main')

@section('title', 'Редактировать категорию')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <b>Редактировать категорию</b>
    <form action="{{ route('admin.categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
            @error('name')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Изменить">
        </div>
    </form>
@endsection
