<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            {{-- Flash success message --}}
            @if (session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('kontak.sendVerification') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama"
                           class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                           required value="{{ old('nama') }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                           class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                           required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea name="pesan" id="pesan"
                              class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                              rows="4">{{ old('pesan') }}</textarea>
                </div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
