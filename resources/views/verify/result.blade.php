<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Verifikasi Berhasil</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <div class="bg-white p-6 rounded shadow">
            <p><strong>IP Address:</strong> {{ $ip }}</p>
            <p><strong>Waktu:</strong> {{ $waktu }}</p>
            <p><strong>Token:</strong> {{ $token }}</p>
        </div>
    </div>
</x-app-layout>
