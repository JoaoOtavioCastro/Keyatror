@extends('layouts.main')
@section('title', 'Editar')
@section('content')
<div class="container">
    <h2>criar</h2>
    @php
        use App\Models\Layer;

        $pub = Layer::find($account->layer_id)->public_id;
    @endphp
    <a href="{{ route('accounts.index', $pub) }}">voltar</a>
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
    <form action="{{ route('accounts.update', ['account' => $account->public_id])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $account->name}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$account->email}}">
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$account->url}}">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Usuário</label>
        <input type="text" class="form-control" id="username" name="username" value="{{$account->username}}">
    </div>
    <div class="mb-3 ">
        <label for="password">Senha</label>
        <input type="hidden" name="layer_id" value="{{ $account->layer_id }}" id="layer_id">
        <input type="password" name="password" id="password" required class="form-control"
            value="{{$account->password}}">
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Notas</label>
        <textarea class="form-control" id="notes" name="notes" rows="3">{{$account->notes}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection