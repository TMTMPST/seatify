@extends('layouts.admin')
@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form class="w-full mx-auto" action="{{ route('admin.band.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="lg:grid lg:grid-cols-2 gap-5">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="banner">Upload Banner Band</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="banner" name="banner" type="file" required>
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Band</label>
                    <input type="text" id="name" name="name" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Band" required />
                </div>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis Deskripsi Band...."></textarea>
            </div>
            <hr class="h-px bg-gray-200 border-0 mb-5">
            <div class="mb-5">
                <label for="dropdown" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Anggota Band</label>
                <select id="dropdown" name="members_count" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="" disabled selected>Pilih opsi</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="mb-5 lg:grid lg:grid-cols-2 gap-5">
                @for ($i = 1; $i <= 4; $i++)
                    <div id="anggota{{ $i }}" style="display: none;">
                        <h1 class="text-lg font-bold mb-3">Anggota {{ $i }}</h1>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="member_photo{{ $i }}">Upload Foto Anggota</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="member_photo{{ $i }}" name="members[{{ $i - 1 }}][photo]" type="file" required>
                        </div>
                        <div class="lg:grid lg:grid-cols-2 gap-5">
                            <div class="mb-5">
                                <label for="member_name{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900">Nama Anggota</label>
                                <input type="text" id="member_name{{ $i }}" name="members[{{ $i - 1 }}][name]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Anggota" required />
                            </div>
                            <div class="mb-5">
                                <label for="member_position{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900">Posisi Band</label>
                                <input type="text" id="member_position{{ $i }}" name="members[{{ $i - 1 }}][position]" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Posisi Anggota" required />
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <hr class="h-px bg-gray-200 border-0 mb-5">
            <div class="mb-5">
                <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900">Instagram</label>
                <input type="text" id="instagram" name="instagram" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Social Media" />
            </div>
            <div class="flex flex-row space-x-2">
                <a href="/admin/bio-artis">
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
                    if (i <= selectedValue) {
                        anggotaDiv.style.display = "block";
                    } else {
                        anggotaDiv.style.display = "none";
                    }
                }
            });
    
            for (let i = 1; i <= maxAnggota; i++) {
                document.getElementById(`anggota${i}`).style.display = "none";
            }
        });
    </script>
@endsection
