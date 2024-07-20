@extends('layouts.main')
@section('title', 'Keyatror')

@section('content')
<h1>Accounts</h1>
<p>This is the Accounts page</p>
<hr>
<a href="{{ route('accounts.create') }}" class="btn btn-primary">Create</a>
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
    @if (count($accounts) === 0)
        <div class="col">
            <div class="card " style="width: 25rem;">
                <h5 class="card-header d-flex flex-center">No accounts found</h5>
            </div>
        </div>

    @endif
    @foreach ($accounts as $account)
        <div class="col">
            <div class="card " style="width: 25rem;">
                <h5 class="card-header d-flex flex-center">{{ $account->name }}

                    <div class="button-group d-flex m-1">
                        <a href="{{ route('accounts.edit', $account->public_id) }}" class="btn btn-warning"><img
                                src="https://img.icons8.com/?size=100&id=49&format=png&color=000000" alt=""></a>
                        <form action="{{ route('accounts.destroy', $account->public_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><img
                                    src="https://img.icons8.com/?size=100&id=67884&format=png&color=000000" alt=""></button>
                        </form>
                    </div>
                </h5>
                <div class="card-body">
                    <a class="card-text" target="_blank" href="{{ $account->url }}" >{{ $account->url }}</a>
                    <p class="card-text">{{ $account->notes }}</p>

                    <button class="form-control m-1" onclick="copyToClipboard('{{ $account->password }}')">Password</button>
                    <button class="form-control m-1" onclick="copyToClipboard('{{ $account->username }}')">User</button>
                    <button class="form-control m-1" onclick="copyToClipboard('{{ $account->email }}')">Email</button>
                    <script>
                        function copyToClipboard(text) {
                            navigator.clipboard.writeText(text)
                                .then(() => {
                                    console.log('Text copied to clipboard');
                                })
                                .catch(err => {
                                    console.error('Error copying text: ', err);
                                });
                        }
                    </script>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection