@extends('layouts.app')

@section('title', 'Главная')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Блог</div>

                <div class="card-body">
                    Добро пожаловать в наш блог!
                </div>
            </div>
        </div>
    </div>
@endsection
