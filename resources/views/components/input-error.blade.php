@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'invalid-feedback d-block']) }}>
        @foreach ((array) $messages as $message)
            <i class="bi bi-exclamation-triangle me-1"></i>
            {{ $message }}
        @endforeach
    </div>
@endif
