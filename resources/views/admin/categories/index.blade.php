@extends('layouts.app')

@section('title', 'Категории CRUD')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Все категории</div>
                <diV class="card-body">
                    <a href="{{ route('admin.categories.create') }}">Создать категорию</a><br>

                    @foreach($categories as $category)
                        <div style="margin: 5px 0;">
                            {{ $category->name }}
                            <a href="{{ route('admin.categories.edit', $category) }}">[edit]</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">[x]</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </diV>
    </div>
@endsection
