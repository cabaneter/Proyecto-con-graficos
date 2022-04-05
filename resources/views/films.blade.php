<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de películas') }}
        </h2>
    </x-slot>   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            {{ $films->links() }}
        </div>
    </div>
    @foreach ($films as $film)
        <div class="py-4">  
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            <li>Titulo: {{ucfirst(strtolower($film->title))}}</li>
                            <li>Descripcion: {{$film->description}}.</li>
                            <li>Idioma: 
                                {{$film->language->name}}
                                </li>
                            <li>Actores:
                                @php
                                    $actor2= $actor1[0];
                                    array_shift($actor1);
                                @endphp
                                @foreach ($actor2 as $ac)
                                    | {{ucfirst(strtolower($ac->nombre))}} {{ucfirst(strtolower($ac->apellido))}} 
                                @endforeach 
                            </li>
                            <li>Duración del alquiler: {{$film->rental_duration}} dias</li>
                            <li>Coste alquiler: {{$film->rental_rate}}$</li>
                            <li>Duración: {{$film->length}} min.</li>
                            <li>Coste de reemplazamiento: {{$film->replacement_cost}}$</li>
                            <li>Clasificación: {{$film->rating}}</li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            {{ $films->links() }}
        </div>
    </div>
</x-app-layout>
