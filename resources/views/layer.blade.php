@extends('layouts.main')
@section('title', $layer->name)



@section('content')


<div class="container">
<a href="{{ route('layers.index') }}" class="btn btn-primary">Back</a>

    <h1>{{$layer->name}}</h1>
    <hr>
    <hr>
    <form action="{{ route('accounts.index')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
            <input type="hidden" name="layer" value="{{$layer->public_id}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection