@extends('layouts.main')
@section('title', 'Keyatror')

@section('content')
<h1>Layers</h1>
<p>This is the layers page</p>
<hr>
<a href="{{ route('layers.create') }}" class="btn btn-primary">Create</a>
<hr>
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
<div class="row row-cols-1 row-cols-md-3 g-4">
    @if (count($layers) === 0)
        <div class="col">
            <div class="card " style="width: 25rem;">
                <h5 class="card-header d-flex flex-center">No layers found</h5>
            </div>
        </div>
    
    @endif
    @foreach ($layers as $layer)
        <div class="col">
            <div class="card " style="width: 25rem;">
                <h5 class="card-header d-flex flex-center">{{ $layer->name }}
                @if($layer->is_protected)
                    <div class="button-group d-flex m-1">
                        <a href="{{ route('layers.edit', $layer->public_id) }}" class="btn btn-warning"><img src="https://img.icons8.com/?size=100&id=49&format=png&color=000000"
                                alt=""></a>
                        <form action="{{ route('layers.destroy', $layer->public_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><img src="https://img.icons8.com/?size=100&id=67884&format=png&color=000000" alt=""></button>
                        </form>
                    </div>
                    @endif
                </h5>
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