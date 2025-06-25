@extends('layouts.app')

@section('title', 'Создать категорию')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить категорию</div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Название:</label>
                            <div class="col-md-6">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                                    value="{{ old('name') }}">
                                @error('name')
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
