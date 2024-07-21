@extends('layouts.main')
@section('title', 'Editar')
@section('content')
<div class="container">
    <h2>editar</h2>
    <a href="{{ route('layers.index')}}">voltar</a>
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
    <form action="{{ route('layers.update', ['layer' => $layer->public_id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $layer->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description"
                rows="3">{{ $layer->description }}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="change_pass" name="change_pass"
                onchange="togglePasswordInput(this)">
            <label class="form-check label" for="change_pass">Deseja trocar a senha?</label>
            <input type="hidden" name="is_protected" value="true" id="is_protected">
            <script>
                function togglePasswordInput(checkbox) {
                    var passwordInput = document.getElementById('password');
                    passwordInput.disabled = !checkbox.checked;
                }
            </script>
            <input type="password" name="password" id="password" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection