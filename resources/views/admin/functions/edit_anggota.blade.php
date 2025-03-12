@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.band.anggota.update', ['band' => $band->id, 'anggota' => $anggota->id]) }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
            @method('PUT')
            
            <h1 class="text-xl font-bold mb-4">Edit Anggota Band</h1>
            
            @foreach($band->members as $index => $member)
                <div class="mb-5 p-4 bg-white rounded-lg shadow-sm" style="border-left: 4px solid #3b82f6;">
                    <h2 class="text-lg font-semibold mb-3">Anggota {{ $index + 1 }}</h2>
                    
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="foto_anggota{{ $index }}">Upload Foto Anggota</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="foto_anggota{{ $index }}" type="file" name="members[{{ $index }}][image]">
                        @if($member->image)
                            <img id="preview{{ $index }}" src="{{ Storage::url($member->image) }}" class="mt-3 w-40 rounded-lg" />
                        @else
                            <img id="preview{{ $index }}" class="mt-3 w-40 rounded-lg hidden" />
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-5">
                            <label for="nama_anggota{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900">Nama Anggota</label>
                            <input type="text" id="nama_anggota{{ $index }}" name="members[{{ $index }}][name]" value="{{ $member->name }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Anggota" required />
                        </div>
                        <div class="mb-5">
                            <label for="posisi_anggota{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900">Posisi Band</label>
                            <input type="text" id="posisi_anggota{{ $index }}" name="members[{{ $index }}][role]" value="{{ $member->role }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Posisi di Band" required />
                        </div>
                    </div>
                    
                    <input type="hidden" name="members[{{ $index }}][id]" value="{{ $member->id }}">
                </div>
            @endforeach
            
            <div class="flex flex-row space-x-2 mt-5">
                <a href="{{ route('admin.band.index') }}">
                    <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Kembali</button>
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Perbarui Semua Anggota</button>
            </div>
        </form>
    </div>

    @foreach($band->members as $index => $member)
        <script>
            document.getElementById('foto_anggota{{ $index }}').addEventListener('change', function(event) {
                let reader = new FileReader();
                reader.onload = function() {
                    let img = document.getElementById('preview{{ $index }}');
                    img.src = reader.result;
                    img.classList.remove('hidden');
                };
                reader.readAsDataURL(event.target.files[0]);
            });
        </script>
    @endforeach
@endsection