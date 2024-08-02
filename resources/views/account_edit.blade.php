@extends('layouts.main')
@section('title', 'Editar Conta')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Conta</h2>
    
    @php
        use App\Models\Layer;
        $pub = Layer::find($account->layer_id)->public_id;
    @endphp

    <a href="{{ route('accounts.index', $pub) }}" class="btn btn-secondary mb-3">Voltar</a>

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

    <form action="{{ route('accounts.update', ['account' => $account->public_id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $account->email }}" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ $account->url }}" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $account->username }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="hidden" name="layer_id" value="{{ $account->layer_id }}" id="layer_id">
                <input type="hidden" name="password" disabled  id="password" class="form-control" value="{{ $account->password }}">
    <p class="text-danger">A senha não pode ser alterada!</p>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notas</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $account->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection
