<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peliculas por actor') }}
        </h2>
    </x-slot>
    <div class="py-6" align="center">
        <form method="POST" action='{{route('alquileresXciudad6')}}'>
            @csrf
            
            <select  name="actor" id="actor" style="border-radius: 5px">
                @foreach ($actores as $actor)
                <option value="{{$actor->actor_id}}">{{$actor->first_name}} {{$actor->last_name}}</option>
                @endforeach
            </select>
            </select>
            <select  name="orden" id="orden" style="border-radius: 5px">
                <option value="asc">Ascendente</option>
                <option value="desc">Descendente</option>
            </select>
            <input id="limit" name="limit" type="number" step="1" placeholder="Número de resultados" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
        
            <button class="p-2 bg-white border-gray-200" type="submit" style="border-radius: 5px; border: solid rgb(124, 124, 124) 1px">Generar gráfico</button> <br>
        </form>
    </div>
</x-app-layout>