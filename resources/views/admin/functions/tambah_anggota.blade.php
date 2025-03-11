@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.band.anggota.store', ['band' => $band->id]) }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
            <input type="hidden" name="band" value="{{ $band->id }}">
            
            <div class="mb-5">
                <label for="jumlah_anggota" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Anggota Band</label>
                <select id="jumlah_anggota" name="jumlah_anggota" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="" disabled selected>Pilih jumlah anggota</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>                 
            </div>
        
            <div class="mb-5 lg:grid lg:grid-cols-2 gap-5">
                @for ($i = 1; $i <= 4; $i++)
                    <div id="anggota{{ $i }}" class="anggota" style="display: none;">
                        <h1 class="text-lg font-bold mb-3">Anggota {{ $i }}</h1>
                        <div class="mb-3">
                            <label for="foto_anggota{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900">URL Foto Anggota</label>
                            <input type="text" id="foto_anggota{{ $i }}" name="members[{{ $i-1 }}][image]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan URL Gambar (Opsional)" />
                        </div>
                        <div class="lg:grid lg:grid-cols-2 gap-5">
                            <div class="mb-5">
                                <label for="nama_anggota{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900">Nama Anggota</label>
                                <input type="text" id="nama_anggota{{ $i }}" name="members[{{ $i-1 }}][name]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Anggota" required />
                            </div>
                            <div class="mb-5">
                                <label for="posisi_anggota{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900">Posisi Band</label>
                                <input type="text" id="posisi_anggota{{ $i }}" name="members[{{ $i-1 }}][role]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Posisi di Band" required />
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
            const dropdown = document.getElementById("jumlah_anggota");
            const maxAnggota = 4;
    
            function updateVisibility() {
                let selectedValue = parseInt(dropdown.value) || 0;
                for (let i = 1; i <= maxAnggota; i++) {
                    let anggotaDiv = document.getElementById(`anggota${i}`);
                    if (i <= selectedValue) {
                        anggotaDiv.style.display = "block";
                    } else {
                        anggotaDiv.style.display = "none";
                    }
                }
            }
    
            dropdown.addEventListener("change", updateVisibility);
            
            // Set default display based on previously selected value (if any)
            updateVisibility();
        });
    </script>
@endsection
