@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Админка</div>

                    <div class="card-body">
                        Добро пожаловать в админку!
                    </div>
                </div>
            </div>
        </div>
@endsection


