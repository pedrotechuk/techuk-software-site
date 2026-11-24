@extends('layouts.app', ['cabecalhoSolido' => true])

@section('title', 'Política de Privacidade | Techuk Software')
@section('description', 'Como a Techuk Software trata os dados de quem visita o site e fala com a gente por WhatsApp e e-mail.')

@section('conteudo')
<article class="claro legal">
    <div class="wrap">
        <div class="conteudo">
            <p class="rotulo"><b>Legal</b> Privacidade</p>
            <h1>Política de Privacidade</h1>
            <p class="suave">Última atualização: {{ now()->format('d/m/Y') }}</p>

            @if ($t['aviso_rascunho_legal'])
                <div class="aviso-legal" role="note">
                    <strong>Rascunho para revisão jurídica.</strong> Este texto é um modelo consistente com o que o site coleta hoje, mas precisa ser revisado por um advogado antes da publicação.
                </div>
            @endif

            <h2>1. Quem somos</h2>
            <p>Este site é operado pela Techuk Software ("Techuk"). {{ !empty($t['cnpj']) ? 'CNPJ '.$t['cnpj'].'.' : '' }} Contato para assuntos de privacidade: <a href="mailto:{{ $t['contato']['email'] }}">{{ $t['contato']['email'] }}</a>.</p>

            <h2>2. Quais dados coletamos</h2>
            <ul>
                <li><strong>Dados que você nos envia:</strong> quando você clica nos botões de WhatsApp, abre uma conversa com a Techuk. Recebemos o seu número de telefone, o nome do seu perfil e o conteúdo das mensagens. Quando você escreve para o nosso e-mail, recebemos o seu endereço e o conteúdo da mensagem.</li>
                <li><strong>Dados de navegação (somente com o seu consentimento):</strong> se você aceitar os cookies de medição, o Google Analytics 4 e o Meta Pixel coletam informações como páginas visitadas, tempo de visita, tipo de dispositivo, navegador, localização aproximada e cliques nos botões de WhatsApp.</li>
                <li><strong>Sua escolha sobre cookies:</strong> guardamos no seu navegador (armazenamento local) apenas a informação de que você aceitou ou recusou os cookies de medição.</li>
            </ul>
            <p>O site não tem cadastro, login nem formulário, e não coleta dados de pagamento.</p>

            <h2>3. Para que usamos os dados</h2>
            <ul>
                <li>Responder ao seu contato e enviar propostas (base legal: execução de procedimentos preliminares a contrato e legítimo interesse).</li>
                <li>Entender como o site é usado e melhorar o conteúdo e os anúncios (base legal: consentimento).</li>
            </ul>

            <h2>4. Cookies e medição</h2>
            <p>Os scripts do Google Analytics e do Meta Pixel só são carregados depois que você clica em "Aceitar" no aviso de cookies. Se você clicar em "Recusar", eles não são carregados. Você pode mudar de ideia a qualquer momento pelo link "Preferências de cookies" no rodapé do site.</p>

            <h2>5. Compartilhamento</h2>
            <p>Os dados de medição são tratados por Google e Meta, que podem processá-los fora do Brasil. As conversas por WhatsApp são tratadas pela plataforma WhatsApp, conforme as políticas dela. Não vendemos os seus dados.</p>

            <h2>6. Por quanto tempo guardamos</h2>
            <p>Guardamos as conversas de contato pelo tempo necessário para atender você e cumprir obrigações legais. Os dados de medição seguem os prazos configurados nas ferramentas do Google e da Meta. [CONFIRMAR: prazos de retenção]</p>

            <h2>7. Seus direitos</h2>
            <p>Pela Lei Geral de Proteção de Dados (Lei 13.709/2018), você pode pedir confirmação de tratamento, acesso, correção, anonimização, portabilidade, eliminação dos dados e informação sobre compartilhamento, além de revogar o consentimento. Escreva para <a href="mailto:{{ $t['contato']['email'] }}">{{ $t['contato']['email'] }}</a>.</p>

            <h2>8. Segurança</h2>
            <p>O site usa conexão segura (HTTPS) e não guarda dados pessoais em banco de dados próprio.</p>

            <h2>9. Alterações</h2>
            <p>Podemos atualizar esta política. A data da última atualização fica no topo da página.</p>

            <div class="mt-10"><a href="{{ route('home') }}" class="btn btn-marca">Voltar ao início</a></div>
        </div>
    </div>
</article>
@endsection
