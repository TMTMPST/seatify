@props(['href', 'color' => 'green', 'label'])

<a href="{{ $href }}" class="text-{{ $color }}-600 hover:underline font-semibold">
    {{ $label }}
</a>
