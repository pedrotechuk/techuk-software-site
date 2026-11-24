@props(['name'])
@php
    $arquivo = preg_match('/^[a-z0-9-]+$/', $name) ? resource_path("icons/{$name}.svg") : null;
    $miolo = $arquivo && is_file($arquivo) ? file_get_contents($arquivo) : '';
@endphp
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" {{ $attributes }}>{!! $miolo !!}</svg>
