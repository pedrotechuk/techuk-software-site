@extends('layouts.app', ['t' => config('techuk'), 'cabecalhoSolido' => true])

@section('title', 'Página não encontrada | Techuk Software')
@section('description', 'A página que você procura não existe ou mudou de endereço.')
@section('robots')
    <meta name="robots" content="noindex">
@endsection

@section('conteudo')
<section class="escuro erro" aria-labelledby="erro-titulo">
    <div>
        <p class="codigo" aria-hidden="true">404</p>
        <h1 id="erro-titulo" class="titulo mt-6">Essa página não existe.</h1>
        <p class="lead mx-auto mt-5 suave">O endereço pode ter mudado ou ter sido digitado errado. Volte para o início ou fale direto com a gente.</p>
        <div class="mt-9 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('home') }}" class="btn btn-lima">Voltar ao início</a>
            @include('partials.cta', ['origem' => '404', 'texto' => 'Chamar no WhatsApp', 'classe' => 'btn-borda'])
        </div>
    </div>
</section>
@endsection
