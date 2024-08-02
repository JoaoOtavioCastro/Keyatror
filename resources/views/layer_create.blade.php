@extends('layouts.main')
@section('title', 'Criar Camada')

@section('content')
<div class="container mt-4">
    <a href="{{ route('layers.index') }}" class="btn btn-secondary mb-3">Voltar</a>
    
    <h2 class="mb-4">Criar Nova Camada</h2>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('layers.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da camada" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Digite uma descrição para a camada" required></textarea>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="hidden" name="is_protected" value="true" id="is_protected">
            <input type="password" name="password" id="password" class="form-control" placeholder="Digite a senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Camada</button>
    </form>
</div>
@endsection
