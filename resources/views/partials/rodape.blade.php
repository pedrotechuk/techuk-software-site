@php use App\Support\Whatsapp; @endphp
<footer class="rodape">
    <div class="wrap">
        <div class="rodape-grid">
            <div>
                <img src="{{ asset('img/horizontal-degrade-negativo.svg') }}" alt="Techuk Software" width="160" height="51" class="h-12 w-auto" loading="lazy">
                <p class="sub mt-5 max-w-sm">{{ $t['rodape']['frase'] }}</p>
                @if ($t['contato']['instagram'] || $t['contato']['linkedin'])
                    <div class="redes">
                        @if ($t['contato']['instagram'])<a href="{{ $t['contato']['instagram'] }}" target="_blank" rel="noopener" aria-label="Instagram da Techuk">IG</a>@endif
                        @if ($t['contato']['linkedin'])<a href="{{ $t['contato']['linkedin'] }}" target="_blank" rel="noopener" aria-label="LinkedIn da Techuk">in</a>@endif
                    </div>
                @endif
            </div>
            <div>
                <h3>Contato</h3>
                <ul>
                    <li><a href="{{ Whatsapp::url() }}" data-wa data-origem="rodape" target="_blank" rel="noopener">WhatsApp {{ $t['contato']['whatsapp_exibicao'] }}</a></li>
                    <li><a href="mailto:{{ $t['contato']['email'] }}">{{ $t['contato']['email'] }}</a></li>
                </ul>
            </div>
            <div>
                <h3>Legal</h3>
                <ul>
                    <li><a href="{{ route('privacidade') }}">Política de Privacidade</a></li>
                    <li><a href="{{ route('termos') }}">Termos de Uso</a></li>
                    <li><button type="button" class="btn-texto" id="abrir-cookies">Preferências de cookies</button></li>
                </ul>
            </div>
        </div>
        <div class="rodape-fim">
            <span>&copy; {{ date('Y') }} Techuk Software</span>
            @if (!empty($t['cnpj']))<span>CNPJ {{ $t['cnpj'] }}</span>@endif
            <span>Feito no Brasil, para o Brasil.</span>
        </div>
    </div>
</footer>
