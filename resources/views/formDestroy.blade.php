<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <div class="bg-white shadow p-6 rounded-md">
            <h2 class="text-xl text-center font-semibold mb-4 text-red-600">Konfirmasi Hapus Barang</h2>

            <p class="flex justify-center"><strong>Nama Barang:</strong> {{ $barang->nama_barang }}</p>
            <p class="flex justify-center"><strong>Harga:</strong> Rp
                {{ number_format($barang->harga_barang, 0, ',', '.') }}</p>
            <p class="flex justify-center"><strong>Stok:</strong> {{ $barang->stock }}</p>

            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Ya, Hapus Data Ini
                </button>
                <a href="{{ route('barang.index') }}" class="ml-4 text-gray-600 hover:underline bg-gray-200">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>