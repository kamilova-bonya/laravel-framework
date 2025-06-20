@extends('layouts.main')

@section('title', 'Создать категорию')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <b>Добавить категорию</b>
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Добавить">
        </div>
    </form>
@endsection
