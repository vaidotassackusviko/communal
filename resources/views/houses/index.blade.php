<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Namai') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    <div style="height: 50px">
                        @if(auth()->check() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('houses.create') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Sukurti naują namą</a>
                        @endif
                    </div>
                    <table class="table" style="width: 100%">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Adresas</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($houses as $house)
                            <tr>
                                <td><a href="{{ route('houses.show', $house->id) }}" class="btn btn-info">{{ $house->id }}</a></td>
                                <td><a href="{{ route('houses.show', $house->id) }}" class="btn btn-info">{{ $house->address }}</a></td>
                                <td>
                                    <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning">Redaguoti</a>

                                    <form action="{{ route('houses.destroy', $house->id) }}" method="POST" onsubmit="return confirm('Ar tikrai norite ištrinti?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="color: red;">Ištrinti</button>
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
