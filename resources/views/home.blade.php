@extends('layouts.app')

@section('conteudo')
@php use App\Support\Whatsapp; @endphp

{{-- ===================== HERO ===================== --}}
<section class="hero" aria-labelledby="hero-titulo">
    <div class="hero-grade" aria-hidden="true"></div>
    <div class="hero-brilho" aria-hidden="true"></div>
    <div class="wrap hero-grid">
        <div>
            <p class="rotulo rv"><b>Techuk</b> Software</p>
            <h1 id="hero-titulo" class="titulo-hero mt-6 rv" style="--d:.08s">
                {!! Whatsapp::tituloHtml($t['hero']['titulo']) !!}
            </h1>
            <p class="lead mt-7 rv" style="--d:.16s">{{ $t['hero']['subtitulo'] }}</p>
            <div class="mt-9 rv" style="--d:.24s">
                @include('partials.cta', ['origem' => 'hero', 'texto' => $t['hero']['cta'], 'classe' => 'btn-lima'])
            </div>
            <p class="hero-confianca rv" style="--d:.3s">
                <x-icon name="shield-check" />
                <span>{{ $t['hero']['confianca'] }}</span>
            </p>
        </div>

        <div class="cena rv" style="--d:.2s" aria-hidden="true">
            <div class="painel">
                <div class="painel-topo">
                    <img src="{{ asset('img/horizontal-degrade-negativo.svg') }}" alt="" width="90" height="29">
                    <span class="pilula">Hoje</span>
                </div>
                <div class="painel-grade">
                    <div class="mini">
                        <div class="mini-rot">Atendimentos</div>
                        <div class="barras">
                            <i style="height:35%"></i><i style="height:55%;animation-delay:.1s"></i><i style="height:45%;animation-delay:.2s"></i><i style="height:80%;animation-delay:.3s"></i><i style="height:60%;animation-delay:.4s"></i><i style="height:70%;animation-delay:.5s"></i><i style="height:100%;animation-delay:.6s"></i>
                        </div>
                    </div>
                    <div class="mini">
                        <div class="mini-rot">Avaliações</div>
                        <div class="estrelas mt-3" style="color:var(--color-lima)">
                            @for ($i = 0; $i < 5; $i++)<x-icon name="star" />@endfor
                        </div>
                        <div class="fio m mt-3"></div>
                        <div class="fio p mt-2"></div>
                    </div>
                    <div class="mini agenda">
                        <div class="mini-rot">Agenda</div>
                        <div class="agenda-linha"><span>09:00</span><div class="fio m"></div><i class="ponto"></i></div>
                        <div class="agenda-linha"><span>10:30</span><div class="fio"></div><i class="ponto"></i></div>
                        <div class="agenda-linha"><span>14:00</span><div class="fio p"></div><i class="ponto roxo"></i></div>
                    </div>
                </div>
            </div>

            <div class="placa">
                <span class="onda"></span><span class="onda b"></span><span class="onda c"></span>
                <x-icon name="nfc" class="nfc" />
                <img src="{{ asset('img/simbolo-negativa-roxo.svg') }}" alt="" width="64" height="64">
            </div>

            <div class="celular">
                <div class="celular-tela">
                    <div class="nome">Seu negócio</div>
                    <div class="estrelas">
                        @for ($i = 0; $i < 5; $i++)<x-icon name="star" />@endfor
                    </div>
                    <div class="sub">Avaliações no Google</div>
                    <div class="cartinha"><div class="fio"></div><div class="fio m"></div></div>
                    <div class="cartinha"><div class="fio m"></div><div class="fio p"></div></div>
                    <div class="cartinha"><div class="fio"></div><div class="fio m"></div></div>
                    <div class="celular-botao">Avaliar</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== 01 PROBLEMA ===================== --}}
<section class="sec claro" id="problema" aria-labelledby="problema-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>01</b> {{ $t['problema']['rotulo'] }}</p>
        <h2 id="problema-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['problema']['titulo'] }}</h2>
        <div class="grade-3 mt-14">
            @foreach ($t['problema']['itens'] as $item)
                <article class="card rv" style="--d:{{ $loop->index * .1 }}s">
                    <div class="icone-caixa"><x-icon :name="$item['icone']" /></div>
                    <h3>{{ $item['titulo'] }}</h3>
                    <p class="suave">{{ $item['texto'] }}</p>
                </article>
            @endforeach
        </div>
        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'problema', 'texto' => 'Quero resolver isso', 'classe' => 'btn-marca'])
        </div>
    </div>
</section>

{{-- ===================== 02 SOLUCAO ===================== --}}
<section class="sec marca" id="solucao" aria-labelledby="solucao-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>02</b> {{ $t['solucao']['rotulo'] }}</p>
        <h2 id="solucao-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['solucao']['titulo'] }}</h2>
        <p class="lead mt-6 rv" style="--d:.12s">{{ $t['solucao']['texto'] }}</p>
        <div class="degraus">
            @foreach ($t['solucao']['camadas'] as $camada)
                <article class="degrau rv" style="--d:{{ $loop->index * .12 }}s">
                    <div>
                        <span class="num">0{{ $loop->iteration }}</span>
                    </div>
                    <div>
                        <x-icon :name="$camada['icone']" class="mb-4 h-8 w-8" />
                        <h3>{{ $camada['nome'] }}</h3>
                        <p>{{ $camada['texto'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'solucao', 'texto' => 'Quero começar pelo meu degrau', 'classe' => 'btn-lima'])
        </div>
    </div>
</section>

{{-- ===================== 03 COMO FUNCIONA ===================== --}}
<section class="sec claro" id="como-funciona" aria-labelledby="processo-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>03</b> {{ $t['processo']['rotulo'] }}</p>
        <h2 id="processo-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['processo']['titulo'] }}</h2>
        <ol class="passos">
            @foreach ($t['processo']['passos'] as $passo)
                <li class="passo rv" style="--d:{{ $loop->index * .08 }}s">
                    <div class="passo-bola">{{ $loop->iteration }}</div>
                    <div>
                        <h3>{{ $passo['titulo'] }}</h3>
                        <p class="suave">{{ $passo['texto'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'como-funciona', 'texto' => 'Começar a conversa', 'classe' => 'btn-marca'])
        </div>
    </div>
</section>

{{-- ===================== 04 PLANOS ===================== --}}
<section class="sec escuro" id="planos" aria-labelledby="planos-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>04</b> {{ $t['planos']['rotulo'] }}</p>
        <h2 id="planos-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['planos']['titulo'] }}</h2>
        <div class="planos">
            @foreach ($t['planos']['itens'] as $plano)
                <article class="plano rv {{ $plano['destaque'] ? 'destaque' : '' }}" style="--d:{{ $loop->index * .08 }}s">
                    @if ($plano['selo'])<span class="selo">{{ $plano['selo'] }}</span>@endif
                    <h3>{{ $plano['nome'] }}</h3>
                    <p class="resumo">{{ $plano['resumo'] }}</p>
                    <div class="preco">
                        <span class="de">{{ $plano['prefixo'] }}</span>
                        <strong>{{ $plano['mensalidade'] }}</strong><small>/mês</small>
                        <p class="implant">{{ $t['planos']['nota_implantacao'] }}</p>
                    </div>
                    <ul class="inclui">
                        @if ($plano['inclui_anterior'])
                            <li class="herda"><x-icon name="plus" /><span>{{ $plano['inclui_anterior'] }}</span></li>
                        @endif
                        @foreach ($plano['inclui'] as $item)
                            <li><x-icon name="check" /><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                    @if ($plano['prazo'])<span class="prazo-pilula">{{ $plano['prazo'] }}</span>@endif
                    <a href="{{ Whatsapp::urlParaPlano($plano['nome']) }}" class="btn {{ $plano['destaque'] ? 'btn-lima' : 'btn-borda' }}" data-wa data-origem="plano" data-plano="{{ $plano['id'] }}" target="_blank" rel="noopener">
                        {{ $t['planos']['cta'] }} <x-icon name="arrow-right" />
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== 05 NFC ===================== --}}
<section class="sec marca" id="avaliacoes" aria-labelledby="nfc-titulo">
    <div class="wrap nfc-grid">
        <div>
            <p class="rotulo rv"><b>05</b> {{ $t['nfc']['rotulo'] }}</p>
            <h2 id="nfc-titulo" class="titulo mt-6 rv" style="--d:.06s">{{ $t['nfc']['titulo'] }}</h2>
            <p class="lead mt-6 rv" style="--d:.12s">{{ $t['nfc']['texto'] }}</p>
            <ul class="nfc-lista rv" style="--d:.18s">
                @foreach ($t['nfc']['pontos'] as $ponto)
                    <li><x-icon name="check" /><span>{{ $ponto }}</span></li>
                @endforeach
            </ul>
            <div class="rv" style="--d:.24s">
                @include('partials.cta', ['origem' => 'nfc', 'texto' => $t['nfc']['cta'], 'classe' => 'btn-lima', 'mensagem' => 'Olá! Vim pelo site da Techuk e quero a plaquinha NFC de avaliação no meu negócio.'])
            </div>
        </div>
        <div class="demo rv" style="--d:.15s" role="img" aria-label="Animação: o cliente aproxima o celular da plaquinha NFC e a página de avaliação do Google abre.">
            <div class="demo-placa">
                <x-icon name="nfc" class="nfc" />
                <img src="{{ asset('img/simbolo-negativa-roxo.svg') }}" alt="" width="64" height="64" loading="lazy">
            </div>
            <span class="demo-onda"></span><span class="demo-onda b"></span>
            <div class="demo-cel">
                <div class="demo-cel-tela">
                    <span class="t">Como foi o atendimento?</span>
                    <div class="estrelas">
                        @for ($i = 0; $i < 5; $i++)<x-icon name="star" />@endfor
                    </div>
                    <span class="ok">Avaliação enviada</span>
                </div>
            </div>
            <span class="demo-tempo">10 segundos</span>
        </div>
    </div>
</section>

{{-- ===================== 06 PROJETOS ===================== --}}
@if ($t['projetos']['mostrar'])
<section class="sec claro" id="projetos" aria-labelledby="projetos-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>06</b> {{ $t['projetos']['rotulo'] }}</p>
        <h2 id="projetos-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['projetos']['titulo'] }}</h2>
        <p class="lead suave mt-6 rv" style="--d:.12s">{{ $t['projetos']['texto'] }}</p>
        <div class="grade-3 mt-14">
            @foreach ($t['projetos']['itens'] as $projeto)
                <article class="card projeto rv" style="--d:{{ $loop->index * .1 }}s">
                    <div class="projeto-tela" aria-hidden="{{ $projeto['imagem'] ? 'false' : 'true' }}">
                        @if ($projeto['imagem'])
                            <img src="{{ asset($projeto['imagem']) }}" alt="Tela do sistema {{ $projeto['nome'] }}" width="640" height="440" loading="lazy">
                        @else
                            <div class="mock">
                                <div class="mock-barra"><i></i><i></i><i></i></div>
                                @if ($projeto['mockup'] === 'relatorio')
                                    <div class="cols">
                                        <i style="height:40%"></i><i style="height:65%"></i><i style="height:50%"></i><i style="height:90%"></i><i style="height:70%"></i><i style="height:100%"></i>
                                    </div>
                                @elseif ($projeto['mockup'] === 'clientes')
                                    <div class="cel"><i></i><i></i><i></i></div>
                                    <div class="linhas">
                                        <div class="l"><span class="av"></span><div class="fio m"></div><i class="ponto"></i></div>
                                        <div class="l"><span class="av"></span><div class="fio"></div><i class="ponto"></i></div>
                                    </div>
                                @else
                                    <div class="linhas">
                                        <div class="l"><span class="av"></span><div class="fio m"></div><i class="ponto"></i></div>
                                        <div class="l"><span class="av"></span><div class="fio"></div><i class="ponto roxo"></i></div>
                                        <div class="l"><span class="av"></span><div class="fio p"></div><i class="ponto"></i></div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="projeto-corpo">
                        <span class="tag">{{ $projeto['segmento'] }}</span>
                        <h3>{{ $projeto['nome'] }}</h3>
                        <p class="suave">{{ $projeto['descricao'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        @if (!empty($t['projetos']['depoimentos']))
            <div class="depoimentos">
                @foreach ($t['projetos']['depoimentos'] as $dep)
                    <figure class="card rv">
                        <blockquote class="text-lg">{{ $dep['texto'] }}</blockquote>
                        <figcaption class="mt-4 font-apoio text-sm suave">{{ $dep['autor'] }}@if (!empty($dep['cargo'])), {{ $dep['cargo'] }}@endif</figcaption>
                    </figure>
                @endforeach
            </div>
        @endif

        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'projetos', 'texto' => 'Quero um sistema assim', 'classe' => 'btn-marca'])
        </div>
    </div>
</section>
@endif

{{-- ===================== 07 PARA QUEM E ===================== --}}
<section class="sec escuro" id="para-quem" aria-labelledby="segmentos-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>07</b> {{ $t['segmentos']['rotulo'] }}</p>
        <h2 id="segmentos-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['segmentos']['titulo'] }}</h2>
        <ul class="segmentos">
            @foreach ($t['segmentos']['itens'] as $seg)
                <li class="segmento rv" style="--d:{{ ($loop->index % 4) * .06 }}s">
                    <x-icon :name="$seg['icone']" />
                    <span>{{ $seg['nome'] }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'segmentos', 'texto' => 'Falar sobre o meu negócio', 'classe' => 'btn-lima'])
        </div>
    </div>
</section>

{{-- ===================== 08 FAQ ===================== --}}
<section class="sec claro" id="perguntas" aria-labelledby="faq-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>08</b> {{ $t['faq']['rotulo'] }}</p>
        <h2 id="faq-titulo" class="titulo mt-6 max-w-4xl rv" style="--d:.06s">{{ $t['faq']['titulo'] }}</h2>
        <div class="faq">
            @foreach ($t['faq']['itens'] as $item)
                <details class="rv" style="--d:{{ ($loop->index % 4) * .05 }}s">
                    <summary>
                        <span>{{ $item['pergunta'] }}</span>
                        <x-icon name="chevron-down" />
                    </summary>
                    <div><p>{{ $item['resposta'] }}</p></div>
                </details>
            @endforeach
        </div>
        <div class="mt-12 rv">
            @include('partials.cta', ['origem' => 'faq', 'texto' => 'Tirar outra dúvida no WhatsApp', 'classe' => 'btn-marca'])
        </div>
    </div>
</section>

{{-- ===================== CTA FINAL ===================== --}}
<section class="cta-final" id="contato" aria-labelledby="cta-titulo">
    <div class="wrap">
        <p class="rotulo rv"><b>{{ $t['cta_final']['rotulo'] }}</b></p>
        <h2 id="cta-titulo" class="titulo mt-8 rv" style="--d:.06s">{{ $t['slogan'] }}</h2>
        <div class="acoes rv" style="--d:.14s">
            @include('partials.cta', ['origem' => 'cta-final', 'texto' => $t['cta_final']['cta'], 'classe' => 'btn-lima'])
            <a href="mailto:{{ $t['contato']['email'] }}" class="link-email">{{ $t['contato']['email'] }}</a>
        </div>
    </div>
</section>
@endsection
