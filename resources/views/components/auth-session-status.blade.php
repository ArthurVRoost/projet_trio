@props(['status']) @if ($status)
<div {{ $attributes->
    merge(['class' => 'alert alert-success fw-medium']) }}>
    <i class="bi bi-check-circle me-2"></i>
    {{ $status }}
</div>
