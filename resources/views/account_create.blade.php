@extends('layouts.main')
@section('title', 'Criar')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Criar Nova Conta</h2>
    <a href="{{ route('accounts.index', $layer) }}" class="btn btn-secondary mb-3">Voltar</a>

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

    <form action="{{ route('accounts.store') }}" method="post">
        @csrf
        <div class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="hidden" name="layer_id" value="{{ $layer }}" id="layer_id">
                <input type="text" name="password" id="password" required class="form-control" readonly>
                <div class="check-group mt-3" id="campos"></div>
                <button type="button" class="btn btn-primary mt-2" onclick="adiciona()">Gerar Senha</button>
                <script src="{{ asset('/assets/js/script.js') }}"></script>
                <script>
                    var campos = document.getElementById('campos');
                    function adiciona() {
                        campos.innerHTML = `
                        <div class="form-group">
                            <input type="number" name="tamanho" id="tamanho" class="form-control mb-2" placeholder="Tamanho da senha" min="1">
                            <div class="form-check">
                                <input type="checkbox" name="letras" id="letras" class="form-check-input">
                                <label for="letras" class="form-check-label">Letras</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="numeros" id="numeros" class="form-check-input">
                                <label for="numeros" class="form-check-label">Números</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="simbolos" id="simbolos" class="form-check-input">
                                <label for="simbolos" class="form-check-label">Símbolos</label>
                            </div>
                            <button type="button" class="btn btn-warning mt-2" onclick="retira()">Cancelar</button>
                            <button type="button" class="btn btn-success mt-2" onclick="gerar()">Gerar</button>
                        </div>`;
                    }
                    function retira() {
                        campos.innerHTML = '';
                    }
                    function gerar() {
                        var tamanho = document.getElementById('tamanho').value;
                        var senha = gerarSenhaSegura(tamanho, document.getElementById('letras').checked, document.getElementById('numeros').checked, document.getElementById('simbolos').checked);
                        document.getElementById('password').value = senha;
                        campos.innerHTML = '';
                    }
                </script>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notas</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<style>
    /* Adicione este CSS ao seu arquivo de estilos ou dentro de uma tag <style> no seu arquivo Blade */

.card {
    border-radius: 0.5rem;
    box-shadow: 0 0 1rem rgba(0,0,0,0.1);
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.alert {
    border-radius: 0.5rem;
}

.check-group {
    border: 1px solid #ddd;
    border-radius: 0.5rem;
    padding: 1rem;
    margin-top: 1rem;
}
    
</style>
@endsection
