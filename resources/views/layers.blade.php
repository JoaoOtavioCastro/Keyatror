@extends('layouts.main')
@section('title', 'Keyatror')

@section('content')
    <h1>Layers</h1>
    <p>This is the layers page</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($layers as $layer)
    <div class="col">
    <div class="card " style="width: 25rem;">
    <h5 class="card-header">{{ $layer->name }}</h5>
        <div class="card-body">
        <p class="card-text">{{ $layer->description }}</p>
        <a href="{{ route('layers.show', $layer->public_id) }}" class="btn btn-primary">
        @if ($layer->is_protected)
            open    
        @else
            view
        @endif        
        
    
    </a>
    </div>
    </div>
    </div>
    @endforeach
    </div>
@endsection