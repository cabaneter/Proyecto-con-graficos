<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alquileres por ciudad +') }}
        </h2>
    </x-slot>
    <div class="py-6" align="center">
        <form method="POST" action='{{route('alquileresXciudad4')}}'>
            @csrf
            
            <input id="cantidad" name="cantidad" type="number" step="1" placeholder="Número de ciudades" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <select  name="orden" id="orden" style="border-radius: 5px">
                <option value="asc">Ascendente</option>
                <option value="desc">Descendente</option>
            </select>
        
            <button class="p-2 bg-white border-gray-200" type="submit" style="border-radius: 5px; border: solid rgb(124, 124, 124) 1px">Generar gráfico</button> <br>
        </form>
    </div>
</x-app-layout>