@extends('layouts.app')

@section('title', 'Создать пост')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить пост</div>
                <div class="card-body">

                    <form enctype="multipart/form-data" action="{{ route('admin.posts.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Категория</label>
                            <div class="col-md-6">
                                <select class="form-select" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option @if($category->id == old('category_id')) selected @endif
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Заголовок поста</label>
                            <div class="col-md-6">
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                       name="title" id="title" autofocus value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">Текст поста</label>
                            <div class="col-md-6">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                              id="content">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-end">Изображение</label>
                            <div class="col-md-6">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                       name="image" id="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
