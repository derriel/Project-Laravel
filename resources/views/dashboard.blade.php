<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Tambah -->
            <div class="btn btn-primary btn-sm mb-4 ">
                <a href="{{url('/barang/create')}}">Tambah barang</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="table table-striped table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th class="px-6 py-4 text-center font-semibold">No</th>
                                    <th class="px-6 py-4 text-center font-semibold">Nama Barang</th>
                                    <th class="px-6 py-4 text-center font-semibold">Harga</th>
                                    <th class="px-6 py-4 text-center font-semibold">Stok</th>
                                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($barang as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 text-center text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-center text-gray-900">{{ $item->nama_barang }}</td>
                                    <td class="px-6 py-4 text-center text-gray-900">Rp
                                        {{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-center text-gray-900">{{ $item->stock }}</td>
                                    <td class="px-6 py-4 text-center text-blue-600 hover:underline">
                                        <a href="{{ url('barang/create?id=' . $item->id) }}"
                                            class="btn btn-sm btn-warning me-2">Edit</a>
                                        <a href="{{ route('barang.confirmDestroy', $item->id) }}"
                                            class="btn btn-sm btn-danger me-2"> Hapus</a>
                                        <a href="{{ route('barang.show', $item->id) }}"
                                            class="btn btn-sm btn-info me-2">View</a>


                                    </td>
                                </tr>
                                @endforeach

                                @if ($barang->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data barang.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>