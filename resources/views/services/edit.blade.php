<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redaguoti paslaugą') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Pavadinimas:</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $service->name }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Kaina:</label>
                            <input type="number" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $service->price }}" required />
                        </div>
                        <div class="mb-4">
                            test - {{ $service->house_id }} - {{ $service->price }}
                            <label for="house_id" class="block text-gray-700 text-sm font-bold mb-2">Susijęs namas:</label>
                            <select name="house_id" id="house_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="" disabled>Pasirinkite namą</option>
                                @foreach($houses as $house)
                                    <option value="{{ $house->id }}" @if($house->id == $service->house_id) selected @endif>{{ $house->address }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="background-color: blue; color: white;">Atnaujinti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
