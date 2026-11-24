<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('home', ['t' => config('techuk')]);
    }

    public function privacidade(): View
    {
        return view('legal.privacidade', ['t' => config('techuk')]);
    }

    public function termos(): View
    {
        return view('legal.termos', ['t' => config('techuk')]);
    }

    public function sitemap(): Response
    {
        $paginas = [
            ['loc' => url('/'), 'prioridade' => '1.0'],
            ['loc' => url('/politica-de-privacidade'), 'prioridade' => '0.3'],
            ['loc' => url('/termos-de-uso'), 'prioridade' => '0.3'],
        ];

        return response()
            ->view('sitemap', ['paginas' => $paginas])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $linhas = [
            'User-agent: *',
            'Allow: /',
            '',
            'Sitemap: '.url('/sitemap.xml'),
        ];

        return response(implode("\n", $linhas)."\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
