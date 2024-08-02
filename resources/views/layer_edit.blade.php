@extends('layouts.main')
@section('title', 'Editar Camada')

@section('content')
<div class="container mt-4">
    <a href="{{ route('layers.index') }}" class="btn btn-secondary mb-4">Voltar</a>
    
    <h2 class="mb-4">Editar Camada</h2>

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

    <form action="{{ route('layers.update', ['layer' => $layer->public_id]) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $layer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $layer->description }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="change_pass" name="change_pass" onchange="togglePasswordInput(this)">
            <label class="form-check-label" for="change_pass">Deseja trocar a senha?</label>
            <input type="hidden" name="is_protected" value="true" id="is_protected">
        </div>

        <div class="mb-3" id="password-container" style="display: none;">
            <label for="password" class="form-label">Nova Senha</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Digite a nova senha">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <script>
        function togglePasswordInput(checkbox) {
            var passwordContainer = document.getElementById('password-container');
            passwordContainer.style.display = checkbox.checked ? 'block' : 'none';
        }
    </script>
</div>
@endsection
