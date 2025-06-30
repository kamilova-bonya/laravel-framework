@extends('layouts.app')

@section('title', 'Изменить пост')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменить пост</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('admin.posts.update', $post) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">Категория:</label>
                                <div class="col-md-6">

                                    <select class="form-select" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option {{ old('category_id', $post->category_id) ==
                                            $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name
                                            }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Заголовок:</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" autofocus
                                        value="{{ old('title') ?? $post->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end">Текст:</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                        rows="5">{{ old('content') ?? $post->content }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Изображение:</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                           name="image" id="image">
                                    @if($post->image)
                                        <div class="mt-2">
                                            <small>Текущее изображение:</small>
                                            <img src="{{ asset($post->image) }}" alt="Current image"
                                                 class="img-thumbnail mt-1" style="max-width: 200px;">
                                        </div>
                                        <div class="form-check mt-2">
                                            <input type="checkbox" name="remove_image" id="remove_image"
                                                   class="form-check-input">
                                            <label for="remove_image" class="form-check-label">Удалить текущее
                                                изображение</label>
                                        </div>
                                    @endif
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
