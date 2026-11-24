@extends('layouts.app', ['cabecalhoSolido' => true])

@section('title', 'Termos de Uso | Techuk Software')
@section('description', 'Regras de uso do site da Techuk Software.')

@section('conteudo')
<article class="claro legal">
    <div class="wrap">
        <div class="conteudo">
            <p class="rotulo"><b>Legal</b> Termos</p>
            <h1>Termos de Uso</h1>
            <p class="suave">Última atualização: {{ now()->format('d/m/Y') }}</p>

            @if ($t['aviso_rascunho_legal'])
                <div class="aviso-legal" role="note">
                    <strong>Rascunho para revisão jurídica.</strong> Este texto é um modelo e precisa ser revisado por um advogado antes da publicação.
                </div>
            @endif

            <h2>1. Sobre este site</h2>
            <p>Este site apresenta os serviços da Techuk Software e leva o visitante a conversar com a Techuk pelo WhatsApp ou por e-mail. Ao usar o site, você concorda com estes termos.</p>

            <h2>2. O que o site oferece</h2>
            <p>As informações sobre planos, serviços e valores têm caráter informativo. A contratação só acontece depois de uma proposta e de um contrato firmados entre você e a Techuk. A implantação é paga uma vez, com valor combinado na proposta, e a mensalidade segue o plano contratado.</p>

            <h2>3. Valores e condições</h2>
            <p>Os valores de mensalidade exibidos podem mudar sem aviso prévio no site e não obrigam a Techuk antes da proposta. Prazos, como a entrega da landing page em até 7 dias, dependem do envio das informações e materiais necessários pelo cliente. [CONFIRMAR: condições de prazo no contrato]</p>

            <h2>4. Uso adequado</h2>
            <p>Você concorda em não usar o site para fins ilegais, não tentar acessar áreas restritas e não prejudicar o funcionamento dele.</p>

            <h2>5. Propriedade intelectual</h2>
            <p>Marca, logo, textos, layout e demais conteúdos do site pertencem à Techuk Software e não podem ser copiados ou reutilizados sem autorização.</p>

            <h2>6. Links e serviços de terceiros</h2>
            <p>O site leva a serviços de terceiros, como o WhatsApp. A Techuk não controla esses serviços e não se responsabiliza pelo conteúdo ou pelas políticas deles.</p>

            <h2>7. Limitação de responsabilidade</h2>
            <p>Fazemos o possível para manter o site no ar e correto, mas ele é oferecido como está, e pode ficar indisponível ou conter erros. A Techuk não promete resultados específicos de vendas, clientes ou avaliações.</p>

            <h2>8. Privacidade</h2>
            <p>O tratamento de dados pessoais está descrito na <a href="{{ route('privacidade') }}">Política de Privacidade</a>.</p>

            <h2>9. Lei aplicável e contato</h2>
            <p>Estes termos seguem as leis do Brasil. [CONFIRMAR: foro] Dúvidas: <a href="mailto:{{ $t['contato']['email'] }}">{{ $t['contato']['email'] }}</a>.</p>

            <div class="mt-10"><a href="{{ route('home') }}" class="btn btn-marca">Voltar ao início</a></div>
        </div>
    </div>
</article>
@endsection
