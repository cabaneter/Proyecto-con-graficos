<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alquileres por ciudad') }}
        </h2>
    </x-slot>
    <div class="py-6" align="center">
        <form method="POST" action='{{route('alquileresXciudad2')}}'>
            @csrf
            
            <select  name="ciudad" id="ciudad" style="border-radius: 5px">
        
                @foreach($ciudades as $ciudad)
                <option value="{{$ciudad->city_id}}">{{$ciudad->city}}</option>
                @endforeach

            </select>
            <button class="p-2 bg-white border-gray-200" type="submit" style="border-radius: 5px; border: solid rgb(124, 124, 124) 1px">Generar gráfico</button> <br>
        </form>
    </div>
</x-app-layout>