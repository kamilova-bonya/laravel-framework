@extends('layouts.app')

@section('title', 'Посты CRUD')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Все посты</div>
                <diV class="card-body">
                    <b>Все посты</b>
                    <a href="{{ route('admin.posts.create') }}">Создать пост</a><br>

                    @foreach($posts as $post)
                        <div style="margin: 5px 0;">
                            {{ $post->title }}
                            <a href="{{ route('admin.posts.edit', $post) }}">[edit]</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">[x]</button>
                            </form>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


