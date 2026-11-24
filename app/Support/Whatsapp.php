<?php

namespace App\Support;

class Whatsapp
{
    /**
     * Link wa.me com mensagem pronta. Sem mensagem, usa a padrao do config.
     */
    public static function url(?string $mensagem = null): string
    {
        $numero = config('techuk.contato.whatsapp');
        $texto = $mensagem ?? config('techuk.whatsapp_mensagem_padrao');

        return 'https://wa.me/'.$numero.'?text='.rawurlencode($texto);
    }

    public static function urlParaPlano(string $nomePlano): string
    {
        return self::url("Olá! Vim pelo site da Techuk e quero uma proposta do plano {$nomePlano}.");
    }

    /**
     * Quebra o titulo em partes e marca as palavras entre {{ }} para destaque.
     *
     * @return array<int, array{texto: string, destaque: bool}>
     */
    public static function partesDeTitulo(string $titulo): array
    {
        $partes = preg_split('/\{\{(.*?)\}\}/', $titulo, -1, PREG_SPLIT_DELIM_CAPTURE);
        $saida = [];

        foreach ($partes as $i => $parte) {
            if ($parte !== '') {
                $saida[] = ['texto' => $parte, 'destaque' => $i % 2 === 1];
            }
        }

        return $saida;
    }

    /**
     * Titulo em HTML seguro, com as palavras destacadas dentro de <span class="lima">.
     */
    public static function tituloHtml(string $titulo): string
    {
        $html = '';

        foreach (self::partesDeTitulo($titulo) as $parte) {
            $texto = e($parte['texto']);
            $html .= $parte['destaque'] ? '<span class="lima">'.$texto.'</span>' : $texto;
        }

        return $html;
    }
}
