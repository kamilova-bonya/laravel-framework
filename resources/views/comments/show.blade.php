@extends('layouts.app')

@section('title', 'Комментарий')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Комментарий к посту "{{ $comment->post->title }}"</div>
                <div class="card-body">
                    <div class="comment mb-3">
                        <div class="comment-content">
                            <p>{{ $comment->content }}</p>
                        </div>
                        <div class="comment-meta">
                            <small class="text-muted">
                                Автор: {{ $comment->user->name }},
                                {{ $comment->created_at->format('d.m.Y H:i') }}
                            </small>
                        </div>
                    </div>
                    <a href="{{ route('posts.show', $comment->post) }}" class="btn btn-primary">Назад к посту</a>
                </div>
            </div>
        </div>
    </div>
@endsection
