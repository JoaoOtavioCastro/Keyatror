@extends('layouts.main')
@section('title', 'Keyatror')
@section('content')

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img class="img-fluid rounded" src="{{ asset('/assets/img/secimage.png') }}" alt="Segurança Digital">
        </div>
        <div class="col-md-6">
            <h1 class="display-4 font-weight-bold">Sua segurança digital começa aqui!</h1>
            <h4 class="font-weight-light mb-4">Crie combinações invulneráveis com um clique.</h4>
            <p class="lead">Em um mundo onde a segurança online é mais crucial do que nunca, <br> contar com senhas fortes e únicas é fundamental para proteger suas informações pessoais e profissionais.</p>
        </div>
    </div>
</div>
<style>
    /* Adicione este CSS ao seu arquivo de estilos ou dentro de uma tag <style> no seu arquivo Blade */

.img-fluid {
    max-width: 100%;
    height: auto;
}

.display-4 {
    font-size: 3.5rem;
}

.font-weight-bold {
    font-weight: 700;
}

.font-weight-light {
    font-weight: 300;
}

.lead {
    font-size: 1.25rem;
}

.mt-4 {
    margin-top: 2rem;
}

</style>
@endsection
