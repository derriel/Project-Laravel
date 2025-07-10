<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">

        <form method="POST" action="{{ route('barang.store') }}">
            @csrf
            <input type="hidden" name="action_task" value="save_barang">
            <input type="hidden" name="id" value="{{ $barang['id'] }}">

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4">
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" required
                           value="{{ $barang['nama_barang'] }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="harga_barang" class="block text-sm font-medium text-gray-700 mb-1">Harga Barang</label>
                    <input type="number" name="harga_barang" id="harga_barang" required
                           value="{{ $barang['harga_barang'] }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stock" id="stock" required
                           value="{{ $barang['stock'] }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>

<button type="submit" class="btn btn-primary">
    Simpan 
</button>

            </div>
        </form>
    </div>
</x-app-layout>
