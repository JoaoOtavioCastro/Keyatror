@extends('layouts.main')
@section('title', $layer->name)



@section('content')


<div class="container">
<h1>{{$layer->name}}</h1>
<p>This is the layer page</p>
<hr>
<a href="{{ route('layers.index') }}" class="btn btn-primary">Back</a>
<hr>
@var_dump($layer);
</div>

@endsection
