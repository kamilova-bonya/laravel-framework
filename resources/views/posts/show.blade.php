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

                        @if($post->image)
                            <img class="w-25 me-2 float-start" src="{{ asset('storage/' . $post->image) }}" alt="img">
                        @endif
                        <h5>{{ $post->title }}</h5>

                        <p class="mt-2">{{ $post->content }}</p>
                    </div>

                    <button data-id="{{ $post->id }}" class="btn btn-primary w-25 likeButton ms-3 mb-2">
                        Likes: <span id="likeCount">{{ $post->likes }}</span>
                    </button>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Комментарии ({{ $post->comments->count() }})</span>
                    @auth
                        <a href="{{ route('comments.create', $post) }}" class="btn btn-sm btn-primary">Добавить
                            комментарий</a>
                    @endauth
                </div>
                <div class="card-body">
                    @forelse($post->comments as $comment)
                        <div class="comment mb-3 border-bottom pb-3">
                            <div class="comment-content">
                                <a href="{{ route('comments.show', $comment) }}" class="text-decoration-none">
                                    <p>{{ $comment->content }}</p>
                                </a>
                            </div>

                            <div class="comment-meta d-flex justify-content-between">
                                <small class="text-muted">
                                    Автор: {{ $comment->user->name }},
                                    {{ $comment->created_at->format('d.m.Y H:i') }}
                                </small>

                                @auth
                                    @if(auth()->id() == $comment->user_id)
                                        <div class="comment-actions">
                                            <a href="{{ route('comments.edit', $comment) }}"
                                               class="btn btn-sm btn-outline-primary">[edit]</a>
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">[x]</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Пока нет комментариев</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
