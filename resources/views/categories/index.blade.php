@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Категории</div>
                <div class="card-body">
                    @foreach($categories as $category)
                        <div class="mb-2">
                            <a href="{{ route('posts.categories.show', $category) }}">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


