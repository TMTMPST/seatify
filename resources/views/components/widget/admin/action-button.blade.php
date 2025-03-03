@props(['href', 'color' => 'blue', 'label'])

<a href="{{ $href }}" class="text-{{ $color }}-600 hover:underline font-semibold">
    {{ $label }}
</a>
