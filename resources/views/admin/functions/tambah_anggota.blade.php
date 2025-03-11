@extends('layouts.admin')

@section('admin')
<div class="bg-gray-100 p-5 rounded-xl">
    <form action="{{ route('admin.band.anggota.store', $band->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="band_id" value="{{ $band->id }}">
        
        <div class="mb-5">
            <label for="dropdown" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Anggota Band</label>
            <select id="dropdown" name="jumlah_anggota" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="" disabled selected>Pilih opsi</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>                 
        </div>
    
        <div id="anggota-container">
            @for ($i = 1; $i <= 4; $i++)
                <div id="anggota{{ $i }}" class="anggota-section" style="display: none;">
                    <h1 class="text-lg font-bold mb-3">Anggota {{ $i }}</h1>
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Upload Foto Anggota</label>
                        <input type="file" name="image[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                    </div>
                    <div class="lg:grid lg:grid-cols-2 gap-5">
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Anggota</label>
                            <input type="text" name="name[]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Anggota" />
                        </div>
                        <div class="mb-5">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Posisi Band</label>
                            <input type="text" name="role[]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Posisi Band" />
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    
        <div class="flex flex-row space-x-2">
            <a href="{{ route('admin.band.index') }}">
                <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Kembali</button>
            </a>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Buat Data</button>
        </div>
    </form>        
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdown = document.getElementById("dropdown");
        const maxAnggota = 4;

        dropdown.addEventListener("change", function () {
            let selectedValue = parseInt(this.value);
            
            for (let i = 1; i <= maxAnggota; i++) {
                let anggotaDiv = document.getElementById(`anggota${i}`);
                anggotaDiv.style.display = i <= selectedValue ? "block" : "none";
            }
        });

        for (let i = 1; i <= maxAnggota; i++) {
            document.getElementById(`anggota${i}`).style.display = "none";
        }
    });
</script>
@endsection
