@php
    use App\Support\Whatsapp;
    $texto = $texto ?? 'Chamar no WhatsApp';
    $classe = $classe ?? 'btn-marca';
@endphp
<a href="{{ Whatsapp::url($mensagem ?? null) }}" class="btn {{ $classe }}" data-wa data-origem="{{ $origem }}" target="_blank" rel="noopener">
    <x-icon name="message-circle" /> {{ $texto }}
</a>
