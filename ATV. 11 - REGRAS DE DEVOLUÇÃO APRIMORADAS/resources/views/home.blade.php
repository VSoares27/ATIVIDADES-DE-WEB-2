@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'library')
                        <br>
                        <h5 class="mt-3">Administração</h5>
                        <div class="list-group">
                            <a href="{{ route ('authors.index') }}" class="list-group-item list-group-item-action">Gerenciar Autores</a>
                            <a href="{{ route ('categories.index') }}" class="list-group-item list-group-item-action">Gerenciar Categorias</a>
                            <a href="{{ route ('debtors.index') }}" class="list-group-item list-group-item-action text-danger">⚠️ Ver Devedores</a>
                            <a href="{{ route ('publishers.index') }}" class="list-group-item list-group-item-action">Gerenciar Editoras</a>
                            <a href="{{ route ('users.index') }}" class="list-group-item list-group-item-action">Gerenciar Usuários</a>
                        </div>
                    @endif

                    <br>
                    <h5 class="mt-3">Acervo</h5>
                    <a href="{{ route ('books.index') }}" class="btn btn-primary">Ver Livros Disponíveis</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
