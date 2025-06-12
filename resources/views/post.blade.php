@extends('layouts.main')

@section('title', 'Пост')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        <b>{{ $post->title }}  </b>
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection



