<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Gambar Galeri') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700" >Judul Gambar</label>
                    <input type="text" name="judul" id="judul"
                           class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                           value="{{ old('judul', $galeri->nama_photo ?? '') }}"
                           required>
                </div>

                    {{-- Gambar Lama --}}
            @if (!empty($galeri->photo))
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Gambar Lama:</label>
                    <img src="{{ asset($galeri->photo) }}" alt="Gambar Lama"
                         class="w-48 h-48 object-cover rounded border">
                </div>
            @endif

            {{-- Gambar Baru --}}
            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-semibold">Upload Gambar Baru (opsional)</label>
                <input type="file" name="gambar" id="gambar"
                       class="w-full mt-1 text-sm text-gray-700 border border-gray-300 rounded cursor-pointer">
            </div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                    {{ isset($galeri->id) ? 'Update' : 'Simpan' }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>