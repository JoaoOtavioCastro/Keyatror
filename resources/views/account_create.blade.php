@extends('layouts.main')
@section('title', 'Criar')
@section('content')
<div class="container">
    <h2>criar</h2>
    <a href="{{ route('accounts.index', $layer) }}">voltar</a>
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
    <form action="{{ route('accounts.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3 ">
            <label for="password">Senha</label>
            <input type="hidden" name="layer_id" value="{{ $layer }}" id="layer_id">
            <input type="text" name="password" id="password" required class="form-control">--

            <!-- Deixa como text pro usuario poder copiar e colar a senha -->

            <div class="check-group" id="campos">
            </div>
            <script src="{{asset('/assets/js/script.js')}}">
            </script>
            <script>
                var campos = document.getElementById('campos');
                function adiciona() {
                    campos.innerHTML = `
                    <input type="number" name="tamanho" id="tamanho" placeholder="Tamanho da senha">
                    <input type="checkbox" name="letras" id="letras">
                    <label for="letras">Letras</label>
                    <input type="checkbox" name="numeros" id="numeros">
                    <label for="numeros">Números</label>
                    <input type="checkbox" name="simbolos" id="simbolos">
                    <label for="simbolos">Símbolos</label>
                    <p onclick="retira()" class='btn btn-warning'>Cancelar</p>
                    <p onclick="gerar()" class='btn btn-success' >Gerar</p>`;
                }
                function retira() {
                    campos.innerHTML = '';
                }
                function gerar() {
                    var tamanho = document.getElementById('tamanho').value;
                    var senha = gerarSenhaSegura(tamanho, document.getElementById('letras').checked, document.getElementById('numeros').checked, document.getElementById('simbolos').checked);
                     document.getElementById('password').value = senha;
                //   alert(senha);
                    campos.innerHTML = '';
                }
            </script>
            <a class="btn btn-primary" onclick="adiciona()">Generate Password</a>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection