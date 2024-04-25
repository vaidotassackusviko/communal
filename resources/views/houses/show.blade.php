<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('House Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-4">House Details</h1>
                    <p><strong>ID:</strong> {{ $house->id }}</p>
                    <p><strong>Address:</strong> {{ $house->address }}</p>
                    {{-- Add more details if needed --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
