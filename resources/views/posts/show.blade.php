@extends('layouts.app')

@section('title', 'Пост')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Просмотр поста</div>
                <div class="card-body">
                    <div class="mb-3">
                        Категория: {{ $post->category->name }}<br>
                        <h5>{{ $post->title }}</h5>
                        <p class="mt-2">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



