@php
    use App\Support\Whatsapp;

    $titulo = trim($__env->yieldContent('title')) ?: $t['seo']['title'];
    $descricao = trim($__env->yieldContent('description')) ?: $t['seo']['description'];
    $canonica = url()->current();
    $imagemOg = asset('img/og-techuk.png');
    $mostrarProjetos = $t['projetos']['mostrar'];
    $prefixo = request()->routeIs('home') ? '' : route('home');

    $dadosEstruturados = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => url('/').'#organizacao',
                'name' => $t['nome'],
                'url' => url('/'),
                'logo' => asset('img/simbolo-colorida.svg'),
                'email' => $t['contato']['email'],
                'telephone' => '+'.$t['contato']['whatsapp'],
            ],
            [
                '@type' => 'ProfessionalService',
                '@id' => url('/').'#servico',
                'name' => $t['nome'],
                'url' => url('/'),
                'image' => $imagemOg,
                'description' => $t['seo']['description'],
                'email' => $t['contato']['email'],
                'telephone' => '+'.$t['contato']['whatsapp'],
                'areaServed' => ['@type' => 'Country', 'name' => 'Brasil'],
                'availableLanguage' => 'pt-BR',
                'parentOrganization' => ['@id' => url('/').'#organizacao'],
            ],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $titulo }}</title>
    <meta name="description" content="{{ $descricao }}">
    <link rel="canonical" href="{{ $canonica }}">
    <meta name="theme-color" content="#18181B">
    @yield('robots')

    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="{{ $t['nome'] }}">
    <meta property="og:title" content="{{ $titulo }}">
    <meta property="og:description" content="{{ $descricao }}">
    <meta property="og:url" content="{{ $canonica }}">
    <meta property="og:image" content="{{ $imagemOg }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Techuk Software: seu negócio mais organizado, mais apresentável e mais lucrativo.">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $titulo }}">
    <meta name="twitter:description" content="{{ $descricao }}">
    <meta name="twitter:image" content="{{ $imagemOg }}">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="preload" href="{{ asset('fonts/geologica-latin-900-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/aleo-latin-400-normal.woff2') }}" as="font" type="font/woff2" crossorigin>

    <script>document.documentElement.classList.add('js');</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">{!! json_encode($dadosEstruturados, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
    {{-- IDs de medicao. Os scripts de GA4 e Pixel so sao carregados pelo app.js apos o consentimento. --}}
    <script type="application/json" id="techuk-config">{!! json_encode(['ga4' => $t['analytics']['ga4_id'] ?: null, 'pixel' => $t['analytics']['meta_pixel_id'] ?: null], JSON_HEX_TAG) !!}</script>
</head>
<body>
    <a href="#conteudo" class="pular">Pular para o conteúdo</a>

    <header class="cabecalho {{ ($cabecalhoSolido ?? false) ? 'rolado' : '' }}" id="cabecalho">
        <div class="wrap cabecalho-in">
            <a href="{{ route('home') }}" aria-label="Techuk Software, página inicial">
                <img src="{{ asset('img/horizontal-degrade-negativo.svg') }}" alt="Techuk Software" width="150" height="48" class="h-10 w-auto md:h-11">
            </a>
            <nav class="nav-links" aria-label="Principal">
                <a href="{{ $prefixo }}#como-funciona">Como funciona</a>
                <a href="{{ $prefixo }}#planos">Planos</a>
                @if ($mostrarProjetos)<a href="{{ $prefixo }}#projetos">Projetos</a>@endif
                <a href="{{ $prefixo }}#perguntas">Perguntas</a>
            </nav>
            <div class="nav-acoes">
                <a href="{{ Whatsapp::url() }}" class="btn btn-lima btn-pequeno nav-cta" data-wa data-origem="cabecalho" target="_blank" rel="noopener">
                    <x-icon name="message-circle" /> Chamar no WhatsApp
                </a>
                <button type="button" class="menu-btn" id="menu-btn" aria-expanded="false" aria-controls="menu-painel" aria-label="Abrir menu">
                    <x-icon name="menu" />
                </button>
            </div>
        </div>
    </header>
    <div class="menu-painel" id="menu-painel">
        <a href="{{ $prefixo }}#como-funciona">Como funciona</a>
        <a href="{{ $prefixo }}#planos">Planos</a>
        @if ($mostrarProjetos)<a href="{{ $prefixo }}#projetos">Projetos</a>@endif
        <a href="{{ $prefixo }}#perguntas">Perguntas</a>
        <a href="{{ Whatsapp::url() }}" class="btn btn-lima" data-wa data-origem="menu" target="_blank" rel="noopener"><x-icon name="message-circle" /> Chamar no WhatsApp</a>
    </div>

    <main id="conteudo">
        @yield('conteudo')
    </main>

    @include('partials.rodape')

    <a href="{{ Whatsapp::url() }}" class="wa-flutuante" id="wa-flutuante" data-wa data-origem="flutuante" target="_blank" rel="noopener" aria-label="Chamar no WhatsApp">
        <x-icon name="message-circle" />
    </a>

    <div class="cookies" id="cookies" role="dialog" aria-modal="false" aria-labelledby="cookies-titulo">
        <h2 id="cookies-titulo">Sua privacidade</h2>
        <p>Usamos cookies de medição (Google Analytics e Meta Pixel) para entender como o site é usado. Eles só são ativados se você aceitar. Veja a <a href="{{ route('privacidade') }}">Política de Privacidade</a>.</p>
        <div class="acoes">
            <button type="button" class="btn btn-lima btn-pequeno" data-cookies="aceitar">Aceitar</button>
            <button type="button" class="btn btn-borda btn-pequeno" data-cookies="recusar">Recusar</button>
        </div>
    </div>
</body>
</html>
