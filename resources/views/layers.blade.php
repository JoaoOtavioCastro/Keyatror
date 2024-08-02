@extends('layouts.main')
@section('title', 'Keyatror - Layers')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Camadas</h1>
    <p class="mb-4">Esta é a página de camadas.</p>
    <a href="{{ route('layers.create') }}" class="btn btn-primary mb-4">Criar Camada</a>
    <hr>

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

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if (count($layers) === 0)
            <div class="col">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Nenhuma camada encontrada</h5>
                        <p class="card-text">Não há camadas disponíveis no momento.</p>
                    </div>
                </div>
            </div>
        @else
            @foreach ($layers as $layer)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>{{ $layer->name }}</span>
                            @if($layer->is_protected)
                                <div class="btn-group">
                                    <a href="{{ route('layers.edit', $layer->public_id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('layers.destroy', $layer->public_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $layer->description }}</p>
                            @if (!$layer->is_protected)
                                <a href="{{ route('accounts.index', $layer->public_id) }}" class="btn btn-primary">Ver</a>
                            @else
                                <a href="{{ route('layers.show', $layer->public_id) }}" class="btn btn-primary">Abrir</a>
                            @endif  
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
