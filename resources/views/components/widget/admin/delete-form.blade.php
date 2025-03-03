@props(['action', 'confirm'])

<form action="{{ $action }}" method="POST" class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline font-semibold" 
        onclick="return confirm('{{ $confirm }}')">
        Hapus
    </button>
</form>
