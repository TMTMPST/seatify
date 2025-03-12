@php
    $konserKategori2 = App\Models\DaftarKonser::where('kategori_id', operator: 2)->get();
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($konserKategori2 as $konser)
        @include('components.templates.KonserCard', ['konser' => $konser])
    @endforeach
</div>

