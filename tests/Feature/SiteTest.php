<?php

namespace Tests\Feature;

use App\Support\Whatsapp;
use Tests\TestCase;

class SiteTest extends TestCase
{
    public function test_home_responde_200_com_titulo_unico(): void
    {
        $resposta = $this->get('/');

        $resposta->assertOk();
        $resposta->assertSee('<html lang="pt-BR">', false);
        $this->assertSame(1, substr_count($resposta->getContent(), '<h1'));
    }

    public function test_paginas_legais_e_arquivos_tecnicos_respondem_200(): void
    {
        foreach (['/politica-de-privacidade', '/termos-de-uso', '/sitemap.xml', '/robots.txt', '/up'] as $rota) {
            $this->get($rota)->assertOk();
        }
    }

    public function test_404_usa_a_marca(): void
    {
        $this->get('/nao-existe')->assertNotFound()->assertSee('Essa página não existe.');
    }

    public function test_link_do_whatsapp_esta_correto(): void
    {
        $url = Whatsapp::url();

        $this->assertStringStartsWith('https://wa.me/5543996935486?text=', $url);
        $this->get('/')->assertSee('https://wa.me/5543996935486', false);
    }

    public function test_botao_de_plano_cita_o_plano(): void
    {
        $url = Whatsapp::urlParaPlano('Crescimento');

        $this->assertStringContainsString(rawurlencode('plano Crescimento'), $url);
        $this->get('/')->assertSee($url, false);
    }

    public function test_analytics_nao_carrega_sem_id(): void
    {
        config(['techuk.analytics.ga4_id' => null, 'techuk.analytics.meta_pixel_id' => null]);

        $html = $this->get('/')->getContent();

        $this->assertStringContainsString('{"ga4":null,"pixel":null}', $html);
        $this->assertStringNotContainsString('googletagmanager.com', $html);
        $this->assertStringNotContainsString('connect.facebook.net', $html);
    }

    public function test_analytics_nao_vai_no_html_mesmo_com_id(): void
    {
        // O carregamento so acontece no navegador, depois do consentimento (app.js).
        config(['techuk.analytics.ga4_id' => 'G-TESTE123', 'techuk.analytics.meta_pixel_id' => '123456']);

        $html = $this->get('/')->getContent();

        $this->assertStringContainsString('G-TESTE123', $html);
        $this->assertStringNotContainsString('<script async src="https://www.googletagmanager.com', $html);
        $this->assertStringNotContainsString('connect.facebook.net', $html);
        $this->assertStringContainsString('data-cookies="aceitar"', $html);
        $this->assertStringContainsString('data-cookies="recusar"', $html);
    }

    public function test_rodape_esconde_redes_e_cnpj_vazios(): void
    {
        config(['techuk.contato.instagram' => null, 'techuk.contato.linkedin' => null, 'techuk.cnpj' => null]);

        $this->get('/')->assertDontSee('PREENCHER: Instagram')->assertDontSee('CNPJ')->assertDontSee('aria-label="Instagram');
    }

    public function test_secao_de_depoimentos_some_sem_depoimentos(): void
    {
        config(['techuk.projetos.depoimentos' => []]);

        $this->get('/')->assertDontSee('class="depoimentos"', false);
    }

    public function test_titulo_do_hero_destaca_as_tres_palavras(): void
    {
        $html = Whatsapp::tituloHtml(config('techuk.hero.titulo'));

        $this->assertSame(3, substr_count($html, '<span class="lima">'));
    }
}
