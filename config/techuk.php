<?php

/*
|--------------------------------------------------------------------------
| Conteudo editavel da landing page da Techuk Software
|--------------------------------------------------------------------------
| Textos, planos, segmentos, FAQ, contatos e IDs de medicao ficam aqui.
| Nao e preciso mexer nas views para mudar precos ou textos.
| Itens marcados com [PREENCHER] ou [CONFIRMAR] dependem de uma decisao sua.
*/

return [

    'nome' => 'Techuk Software',
    'slogan' => 'Seu negócio mais organizado, mais apresentável e mais lucrativo.',

    'seo' => [
        'title' => 'Techuk Software | Site, sistema e avaliações no Google para pequenos negócios',
        'description' => 'A Techuk cria a presença digital do seu pequeno negócio: landing page, sistema administrativo e perfil no Google com plaquinha NFC de avaliação. Planos com mensalidade e atendimento direto no WhatsApp.',
    ],

    'contato' => [
        'whatsapp' => '5543996935486',
        'whatsapp_exibicao' => '(43) 99693-5486',
        'email' => 'techuksoftware@gmail.com',
        // Deixe null enquanto nao existir: o icone fica escondido.
        // Quando criar, troque por a URL completa. [PREENCHER: Instagram] / [PREENCHER: LinkedIn]
        'instagram' => null,
        'linkedin' => null,
    ],

    // Se preencher, aparece no rodape. Vazio = nada aparece. [PREENCHER: CNPJ]
    'cnpj' => null,

    'whatsapp_mensagem_padrao' => 'Olá! Vim pelo site da Techuk e quero saber como funciona.',

    'analytics' => [
        'ga4_id' => env('GA4_ID'),
        'meta_pixel_id' => env('META_PIXEL_ID'),
    ],

    // Mostra o aviso de "rascunho, revisar com advogado" nas paginas legais.
    // Ponha LEGAL_DRAFT_NOTICE=false no .env depois da revisao juridica.
    'aviso_rascunho_legal' => env('LEGAL_DRAFT_NOTICE', true),

    'hero' => [
        'rotulo' => 'Techuk Software',
        // As palavras entre {{ }} ganham destaque em lima.
        'titulo' => 'Seu negócio mais {{organizado}}, mais {{apresentável}} e mais {{lucrativo}}.',
        'subtitulo' => 'Um site que apresenta, um sistema que organiza e avaliações no Google que trazem clientes novos, tudo feito e cuidado por quem fala direto com você.',
        'cta' => 'Quero falar no WhatsApp',
        'confianca' => 'Atendimento direto com quem faz. Entrega da landing page em até 7 dias.',
    ],

    'problema' => [
        'rotulo' => 'O problema',
        'titulo' => 'Seu negócio é bom. O que falta é ser visto e ficar em ordem.',
        'itens' => [
            [
                'icone' => 'map-pin-off',
                'titulo' => 'O cliente não te encontra',
                'texto' => 'Ele procura no Google, não acha um site nem um perfil bem cuidado e acaba indo para o concorrente.',
            ],
            [
                'icone' => 'notebook-pen',
                'titulo' => 'Tudo espalhado',
                'texto' => 'Agenda no caderno, contatos no WhatsApp, pagamentos de cabeça. Fica fácil esquecer e difícil crescer.',
            ],
            [
                'icone' => 'star',
                'titulo' => 'Poucas avaliações',
                'texto' => 'Quem atende bem mas tem poucas estrelas no Google perde a confiança de quem ainda não conhece.',
            ],
        ],
    ],

    'solucao' => [
        'rotulo' => 'A solução',
        'titulo' => 'Três camadas. Você sobe um degrau de cada vez.',
        'texto' => 'Comece pelo que precisa agora. Quando o negócio crescer, a Techuk cresce junto, sem recomeçar do zero.',
        'camadas' => [
            [
                'icone' => 'globe',
                'nome' => 'Presença',
                'texto' => 'Uma página profissional com botão de WhatsApp, no ar com domínio, hospedagem e segurança.',
            ],
            [
                'icone' => 'layout-dashboard',
                'nome' => 'Gestão',
                'texto' => 'Um sistema para organizar clientes, agenda e relatórios, com lembretes automáticos pelo WhatsApp.',
            ],
            [
                'icone' => 'trending-up',
                'nome' => 'Crescimento',
                'texto' => 'Perfil no Google bem cuidado e plaquinha NFC para juntar avaliações a cada atendimento.',
            ],
        ],
    ],

    'processo' => [
        'rotulo' => 'Como funciona',
        'titulo' => 'Do primeiro oi à entrega, em passos curtos.',
        'passos' => [
            ['icone' => 'message-circle', 'titulo' => 'Conversa no WhatsApp', 'texto' => 'Você conta como funciona o seu negócio e o que quer resolver.'],
            ['icone' => 'file-text', 'titulo' => 'Proposta', 'texto' => 'Você recebe o plano indicado, o valor da implantação e o da mensalidade.'],
            ['icone' => 'pen-line', 'titulo' => 'Contrato', 'texto' => 'Combinado o que será entregue, formalizamos tudo de forma simples.'],
            ['icone' => 'hammer', 'titulo' => 'Construção', 'texto' => 'A Techuk monta o seu projeto e mostra o andamento. A landing page sai em até 7 dias.'],
            ['icone' => 'rocket', 'titulo' => 'Entrega e acompanhamento', 'texto' => 'Tudo no ar, você treinado, e a Techuk cuida do suporte e das melhorias todo mês.'],
        ],
    ],

    'planos' => [
        'rotulo' => 'Planos',
        'titulo' => 'Escolha o plano que cabe no seu momento.',
        'nota_implantacao' => 'Implantação única, valor combinado na proposta.',
        'cta' => 'Pedir proposta',
        'itens' => [
            [
                'id' => 'presenca',
                'nome' => 'Presença',
                'resumo' => 'Para ser encontrado e passar confiança.',
                'prefixo' => null,
                'mensalidade' => 'R$ 89',
                'destaque' => false,
                'selo' => null,
                'prazo' => 'Entrega em até 7 dias',
                'inclui_anterior' => null,
                'inclui' => [
                    'Landing page otimizada com botão de WhatsApp',
                    'Domínio, hospedagem e SSL',
                    'Analytics e pixel configurados',
                    'Backup e monitoramento',
                    '1 ajuste por mês',
                ],
            ],
            [
                'id' => 'gestao',
                'nome' => 'Gestão',
                'resumo' => 'Para sair do caderno e organizar o dia a dia.',
                'prefixo' => null,
                'mensalidade' => 'R$ 249',
                'destaque' => false,
                'selo' => null,
                'prazo' => null,
                'inclui_anterior' => 'Tudo do plano Presença',
                'inclui' => [
                    'Sistema administrativo: clientes, agenda e relatórios',
                    'Lembretes e confirmações automáticos por WhatsApp',
                    'Treinamento de 1 hora',
                    '2 horas de melhorias por mês',
                ],
            ],
            [
                'id' => 'crescimento',
                'nome' => 'Crescimento',
                'resumo' => 'Para ser lembrado e bem avaliado.',
                'prefixo' => null,
                'mensalidade' => 'R$ 399',
                'destaque' => true,
                'selo' => 'Mais escolhido',
                'prazo' => null,
                'inclui_anterior' => 'Tudo do plano Gestão',
                'inclui' => [
                    'Perfil no Google Empresas otimizado',
                    'Plaquinha NFC de avaliação',
                    'Pedido automático de avaliação após o atendimento',
                    'Relatório mensal: visitas, contatos e avaliações',
                    '3 horas de melhorias por mês',
                ],
            ],
            [
                'id' => 'premium',
                'nome' => 'Premium',
                'resumo' => 'Para quem precisa de algo sob medida.',
                'prefixo' => 'a partir de',
                'mensalidade' => 'R$ 790',
                'destaque' => false,
                'selo' => null,
                'prazo' => null,
                'inclui_anterior' => 'Tudo do plano Crescimento',
                'inclui' => [
                    'Automações e integrações sob medida',
                    'Suporte prioritário',
                    '6 horas de melhorias por mês',
                ],
            ],
        ],
    ],

    'nfc' => [
        'rotulo' => 'Avaliações no Google com NFC',
        'titulo' => 'Aproxime o celular. Avalie em 10 segundos.',
        'texto' => 'A plaquinha NFC fica no balcão, na recepção ou na mesa. O cliente encosta o celular, a página de avaliação do seu negócio abre na hora e ele deixa as estrelas sem procurar nada. Mais avaliações aparecem no Google e mais gente passa a confiar em você.',
        'pontos' => [
            'Sem aplicativo para baixar',
            'Funciona na maioria dos celulares atuais',
            'Relatório mensal com visitas, contatos e avaliações',
        ],
        'cta' => 'Quero a plaquinha no meu negócio',
    ],

    // Cartoes de projetos. Troque os [PREENCHER] quando enviar os prints e as descricoes.
    // Ponha 'mostrar' => false para esconder a secao inteira (e o link no menu).
    'projetos' => [
        'mostrar' => true,
        'rotulo' => 'Projetos',
        'titulo' => 'Sistemas que a Techuk já desenvolveu.',
        'texto' => 'Cada projeto nasce da rotina de um negócio real.',
        'itens' => [
            [
                'nome' => '[PREENCHER: nome do projeto]',
                'segmento' => 'Clínica de estética',
                'descricao' => '[PREENCHER: descrição do sistema, em 1 ou 2 frases]',
                'imagem' => null, // ex.: 'img/projetos/clinica.webp'
                'mockup' => 'agenda',
            ],
            [
                'nome' => '[PREENCHER: nome do projeto]',
                'segmento' => '[PREENCHER: segmento]',
                'descricao' => '[PREENCHER: descrição do sistema, em 1 ou 2 frases]',
                'imagem' => null,
                'mockup' => 'clientes',
            ],
            [
                'nome' => '[PREENCHER: nome do projeto]',
                'segmento' => '[PREENCHER: segmento]',
                'descricao' => '[PREENCHER: descrição do sistema, em 1 ou 2 frases]',
                'imagem' => null,
                'mockup' => 'relatorio',
            ],
        ],
        // Preencha para exibir a area de depoimentos. Vazio = a area some.
        // Formato: ['texto' => '...', 'autor' => '...', 'cargo' => '...']
        'depoimentos' => [],
    ],

    'segmentos' => [
        'rotulo' => 'Para quem é',
        'titulo' => 'Se atende cliente, a Techuk organiza.',
        'itens' => [
            ['icone' => 'sparkles', 'nome' => 'Clínicas de estética'],
            ['icone' => 'scissors', 'nome' => 'Salões e barbearias'],
            ['icone' => 'wrench', 'nome' => 'Oficinas mecânicas'],
            ['icone' => 'utensils', 'nome' => 'Restaurantes e lanchonetes'],
            ['icone' => 'store', 'nome' => 'Lojas e comércios'],
            ['icone' => 'dumbbell', 'nome' => 'Academias e estúdios'],
            ['icone' => 'stethoscope', 'nome' => 'Consultórios e dentistas'],
            ['icone' => 'paw-print', 'nome' => 'Pet shops'],
            ['icone' => 'pen-tool', 'nome' => 'Estúdios de tatuagem'],
            ['icone' => 'brush', 'nome' => 'Manicures e nail designers'],
            ['icone' => 'heart-pulse', 'nome' => 'Personal trainers e nutricionistas'],
            ['icone' => 'monitor-smartphone', 'nome' => 'Assistências técnicas'],
            ['icone' => 'scale', 'nome' => 'Contabilidade e advocacia'],
            ['icone' => 'car', 'nome' => 'Autoescolas'],
        ],
    ],

    'faq' => [
        'rotulo' => 'Perguntas frequentes',
        'titulo' => 'O que donos de negócio mais perguntam.',
        'itens' => [
            [
                'pergunta' => 'Por que existe mensalidade?',
                'resposta' => 'Porque o seu projeto precisa de cuidado contínuo: hospedagem, segurança, backup, suporte e melhorias todo mês. A implantação paga a construção. A mensalidade mantém tudo funcionando e evoluindo.',
            ],
            [
                'pergunta' => 'O domínio fica no meu nome?',
                'resposta' => 'A intenção é que o endereço do seu negócio seja seu. [CONFIRMAR: regra de titularidade do domínio no contrato]',
            ],
            [
                'pergunta' => 'Posso cancelar quando quiser?',
                'resposta' => 'As regras de cancelamento, prazo e aviso ficam escritas no contrato, de forma clara, antes de você fechar. [CONFIRMAR: prazo mínimo e aviso prévio]',
            ],
            [
                'pergunta' => 'Quanto tempo leva?',
                'resposta' => 'A landing page é entregue em até 7 dias. Sistemas e planos maiores têm prazo combinado na proposta, de acordo com o que você precisa.',
            ],
            [
                'pergunta' => 'Preciso entender de tecnologia?',
                'resposta' => 'Não. Você explica como o seu negócio funciona, a Techuk cuida do resto e ensina o que for preciso para você usar no dia a dia.',
            ],
            [
                'pergunta' => 'Como funciona a plaquinha NFC?',
                'resposta' => 'É uma plaquinha com um chip. O cliente aproxima o celular dela e abre a página de avaliação do seu negócio no Google. Não precisa instalar aplicativo. Ela vem no plano Crescimento e no Premium.',
            ],
            [
                'pergunta' => 'Vocês fazem só o site?',
                'resposta' => 'Não. O plano Presença é só a landing page, mas você pode somar sistema administrativo, perfil no Google, plaquinha NFC e automações conforme o negócio crescer.',
            ],
            [
                'pergunta' => 'Como é o suporte?',
                'resposta' => 'Direto pelo WhatsApp, com quem construiu o seu projeto. Cada plano inclui horas mensais de melhorias, e o Premium tem suporte prioritário. [CONFIRMAR: horário e prazo de resposta]',
            ],
        ],
    ],

    'cta_final' => [
        'rotulo' => 'Vamos conversar',
        'cta' => 'Chamar no WhatsApp',
    ],

    'rodape' => [
        'frase' => 'Presença digital simples para pequenos negócios do Brasil.',
    ],
];
