<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo plato') }}
        </h2>
    </x-slot>
        
    <div class="py-6" align="center" class="inset-x-0 bottom-0">
        <form method="POST" action='{{ route('store') }}'>
            @csrf
            <input id="title" name="title" type="text" placeholder="title" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <input id="description" name="description" type="text" placeholder="description" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <input id="release_year" name="release_year" type="number" step="any" placeholder="0.00" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <input id="replacement_cost" name="replacement_cost" type="number" step="any" placeholder="0.00" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <input id="length" name="length" type="number" step="any" placeholder="0.00" required onKeyPress="if(event.keyCode == 13) event.returnValue = false;" value="" style="border-radius: 5px">
            <select name="language" id="language" style="border-radius: 5px">
        
                @foreach($idiomas as $idioma)
                <option value="{{$idioma->language_id}}">{{$idioma->name}}</option>
                @endforeach

            </select>
            <select name="actor" id="actor" style="border-radius: 5px">
        
                @foreach($actores as $actor)
                <option value="{{$actor->actor_id}}">{{$actor->first_name}}, {{$actor->last_name}}</option>
                @endforeach

            </select>

            <button class="p-2 bg-white border-gray-200" type="submit" style="border-radius: 5px; border: solid rgb(124, 124, 124) 1px">pelicula</button> <br>
        </form>
    </div>
</x-app-layout>