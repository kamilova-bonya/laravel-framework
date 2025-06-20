@extends('layouts.main')

@section('title', 'Категории CRUD')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('danger'))
        <div>{{ session('danger') }}</div>
    @endif

    <b>Все категории</b>
    <a href="{{ route('admin.categories.create') }}">Создать категорию</a><br>

    @foreach($categories as $category)
        <div style="margin: 5px 0;">
            {{ $category->name }}
            <a href="{{ route('admin.categories.edit', $category) }}">[edit]</a>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">[x]</button>
            </form>
        </div>
    @endforeach
@endsection
