<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visos paslaugos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div style="height: 50px">
                        <a href="{{ route('services.create') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Sukurti naują paslaugą</a>
                    </div>
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="text-left">ID</th>
                            <th class="text-left">Pavadinimas</th>
                            <th class="text-left">Kaina</th>
                            <th class="text-left"></th>
                            <th class="text-left"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }} ({{ $service->house->address }})</td>
                                <td>{{ $service->price }}</td>
                                <td>
                                    <!--a href="{{ route('services.show', $service->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Peržiūrėti</a-->
                                    <a href="{{ route('services.edit', $service->id) }}" class="bg-yellow-500 hover:bg-yellow-700  font-bold py-2 px-4 rounded">Redaguoti</a>
                                </td>
                                <td>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" style="background-color: red; color: white;">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
