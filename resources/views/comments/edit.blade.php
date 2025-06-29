@extends('layouts.app')

@section('title', 'Редактирование комментария')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование комментария</div>
                <div class="card-body">
                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">Текст комментария:</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content"
                                          class="form-control @error('content') is-invalid @enderror"
                                          rows="5">{{ old('content', $comment->content) }}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary me-2">Обновить</button>
                                <a href="{{ route('posts.show', $comment->post) }}" class="btn btn-secondary">Отмена</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
