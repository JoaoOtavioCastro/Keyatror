@extends('layouts.main')
@section('title', 'Keyatror')

@section('content')
<div class="container mt-4">
    <div class="mb-4">
        <a href="{{ route('accounts.create', $layer) }}" class="btn btn-primary">Adicionar Conta</a>
        <hr>
    </div>

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

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if (count($accounts) === 0)
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Nenhuma conta encontrada</h5>
                    </div>
                </div>
            </div>
        @endif

        @foreach ($accounts as $account)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><img src="https://www.google.com/s2/favicons?domain={{$account->url}}" alt="icon"> {{ $account->name }}</h5>
                        <div class="button-group">
                            <a href="{{ route('accounts.edit', $account->public_id) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('accounts.destroy', $account->public_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <a class="card-text d-block text-truncate" target="_blank" href="{{ $account->url }}">
                            <i class="bi bi-link-45deg"></i> {{ $account->url }}
                        </a>
                        <p class="card-text">{{ $account->notes }}</p>
                        <button class="btn btn-secondary w-100 mb-1" onclick="copyToClipboard('{{ $account->getPassword() }}')">
                            <i class="bi bi-key"></i> Senha
                        </button>
                        <button class="btn btn-secondary w-100 mb-1" onclick="copyToClipboard('{{ $account->username }}')">
                            <i class="bi bi-person"></i> Usuário
                        </button>
                        <button class="btn btn-secondary w-100" onclick="copyToClipboard('{{ $account->email }}')">
                            <i class="bi bi-envelope"></i> Email
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function copyToClipboard(text) {
        // Cria um elemento temporário de input
        var tempInput = document.createElement('input');
        tempInput.style.position = 'absolute';
        tempInput.style.left = '-1000px';
        tempInput.style.top = '-1000px';
        tempInput.value = text;

        // Adiciona o input ao corpo do documento
        document.body.appendChild(tempInput);

        // Seleciona o texto do input
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // Para dispositivos móveis

        try {
            // Copia o texto selecionado
            var successful = document.execCommand('copy');
            var msg = successful ? 'Texto copiado para a área de transferência' : 'Falha ao copiar o texto';
            alert(msg);
        } catch (err) {
            console.error('Erro ao copiar o texto: ', err);
        }

        // Remove o elemento temporário
        document.body.removeChild(tempInput);
    }
</script>

    @endsection
