@extends('layouts.main')
@section('title', $layer->name)

@section('content')
<div class="container mt-4">
    <a href="{{ route('layers.index') }}" class="btn btn-primary mb-3">Voltar</a>

    <h1 class="mb-4">{{ $layer->name }}</h1>

    <div class="card p-4 shadow-sm">
        <h5 class="card-title mb-3">Verificar Senha da Camada</h5>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('layers.verify') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Digite a senha" required>
                <input type="hidden" name="layer" value="{{ $layer->public_id }}">
            </div>

            <button type="submit" class="btn btn-primary">Verificar</button>
        </form>
    </div>
</div>
@endsection
