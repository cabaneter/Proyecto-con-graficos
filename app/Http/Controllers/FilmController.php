<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function films(){
        $films = Film::paginate(25);
        $languages = Language::all();
        $actor1=[];

        foreach ($films as $film){
            $actor0 = DB::select("select actor.first_name as nombre, actor.last_name as apellido from film
            inner join film_actor on
            film.film_id = film_actor.film_id
            inner join actor on
            film_actor.actor_id = actor.actor_id
            where film.film_id = ".$film->film_id.";");
            array_push($actor1, $actor0);
        }
        //dd($actor1[0][0]->nombre);

        return view('films')
        ->with('films', $films)
        ->with('languages', $languages)
        ->with('actor1', $actor1);
    }

    /* public function create()
    {
        $idiomas = Language::all();
        $actores = Actor::all();
        return view('create')
        ->with('idiomas', $idiomas)
        ->with('actores', $actores);
    }
    
    public function store(Request $request)
    {
        $film =Film::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'release_year'=>$request->release_year,
            'language_id'=>$request->language,
            'length'=>$request->length,
            'replacement_cost'=>$request->replacement_cost,
       ]);
       $idioma = Language::find($request->idioma);
       $film->language()->attach($idioma);
       $actor = Actor::find($request->actor);
       $film->actors()->attach($actor);

        return route('welcome');  
    } */
}
