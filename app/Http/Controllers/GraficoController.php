<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\City;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function meses(){
        $sql1 = "select count(*) as num, month(rental.rental_date) as mes from rental
        where month(rental.rental_date) between month('2005/01/01') and month('2005/8/30')
        group by month(rental.rental_date);";
        $consultas1 = DB::select($sql1);
        $meses = [];
        $i=0;
            foreach ($consultas1 as $consulta) {
                while ($i < (($consulta->mes)-1)) {
                    array_push($meses, 0);
                    $i++;
                }
                array_push($meses, $consulta->num);
                $i++;
            }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql2 = "select film.title as title, count(film.film_id) as numero from film 
        inner join inventory on
        film.film_id = inventory.film_id
        inner join store on
        inventory.store_id = store.store_id
        inner join rental on
        inventory.inventory_id = rental.inventory_id
        group by film.title, film.title
        order by numero desc
        limit 100;";
        $consultas2 = DB::select($sql2);
        $titles = [];
        $titlesnumero = [];
        foreach ($consultas2 as $consulta2) {
            array_push($titles, $consulta2->title);
        }
        foreach ($consultas2 as $consulta2) {
            array_push($titlesnumero, $consulta2->numero);
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql3 = "select city.city as ciudad, sum(payment.amount) as cantidad from city
        inner join address on
        city.city_id = address.city_id
        inner join customer on
        customer.address_id = address.address_id
        inner join payment on 
        customer.customer_id = payment.customer_id
        group by city.city
        limit 100;";
        $consultas3 = DB::select($sql3);
        $cantidad = [];
        $ciudad = [];
        foreach ($consultas3 as $consulta3) {
            array_push($cantidad, $consulta3->cantidad);
        }
        foreach ($consultas3 as $consulta3) {
            array_push($ciudad, $consulta3->ciudad);
        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql4 = "select count(customer.customer_id) as clientes, country.country as pais from customer
        inner join address on
        address.address_id = customer.address_id
        inner join city on
        address.city_id = city.city_id
        inner join country on
        city.country_id = country.country_id
        group by country.country
        limit 10;";
        $consultas4 = DB::select($sql4);
        $clientes = [];
        $pais = [];
        foreach ($consultas4 as $consulta4) {
            array_push($clientes, $consulta4->clientes);
        }
        foreach ($consultas4 as $consulta4) {
            array_push($pais, $consulta4->pais);
        }
        return view('graficomeses')
        ->with('meses', $meses)
        ->with('titles', $titles)
        ->with('titlesnumero', $titlesnumero)
        ->with('cantidad', $cantidad)
        ->with('ciudad', $ciudad)
        ->with('clientes', $clientes)
        ->with('pais', $pais);
    }

    public function alquileresXciudad1()
    {
        $ciudades = City::all();
        return view('graficociudadesform1')
        ->with('ciudades', $ciudades);
    }
    
    public function alquileresXciudad2(Request $request)
    {
        $sql = "select city.city as ciudad, sum(payment.amount) as alquiler from city
        inner join address on
        city.city_id = address.city_id
        inner join customer on
        customer.address_id = address.address_id
        inner join payment on 
        customer.customer_id = payment.customer_id
        where city.city_id = ".$request->ciudad.";";
        $consultas = DB::select($sql);
        $ciudad = [];
        $alquiler = [];
        
        foreach ($consultas as $consulta) {
            array_push($ciudad, $consulta->ciudad);
        }
        foreach ($consultas as $consulta) {
            array_push($alquiler, $consulta->alquiler);
        }

        return view('graficociudadesform2')
        ->with('ciudad', $ciudad)
        ->with('alquiler', $alquiler);
    }

    public function alquileresXciudad3()
    {
        $ciudades = City::all();
        return view('graficociudadesform3')
        ->with('ciudades', $ciudades);
    }

    public function alquileresXciudad4(Request $request)
    {
        $sql = "select city.city as ciudad, sum(payment.amount) as alquiler from city
        inner join address on
        city.city_id = address.city_id
        inner join customer on
        customer.address_id = address.address_id
        inner join payment on 
        customer.customer_id = payment.customer_id
        group by city.city
        order by alquiler ".$request->orden."
        limit ".$request->cantidad.";";
        $consultas = DB::select($sql);
        $ciudad = [];
        $alquiler = [];
        
        foreach ($consultas as $consulta) {
            array_push($ciudad, $consulta->ciudad);
        }
        foreach ($consultas as $consulta) {
            array_push($alquiler, $consulta->alquiler);
        }

        return view('graficociudadesform4')
        ->with('ciudad', $ciudad)
        ->with('alquiler', $alquiler);
    }

    public function alquileresXciudad5()
    {
        $peliculas = Film::all();
        $actores = Actor::all();
        return view('graficociudadesform5')
        ->with('ciudades', $peliculas)
        ->with('actores', $actores);
    }

    public function alquileresXciudad6(Request $request)
    {
        $sql = "select film.title as titulo, film.rental_rate as precio from film
        inner join film_actor on
        film.film_id = film_actor.film_id
        inner join actor on
        film_actor.actor_id = actor.actor_id
        inner join film_category on
        film_category.film_id = film.film_id
        inner join category on
        category.category_id = film_category.category_id
        where actor.actor_id = ".$request->actor."
        order by precio ".$request->orden."
        limit ".$request->limit.";";
        $consultas = DB::select($sql);
        $titulo = [];
        $precio = [];
        
        foreach ($consultas as $consulta) {
            array_push($titulo, $consulta->titulo);
        }
        foreach ($consultas as $consulta) {
            array_push($precio, $consulta->precio);
        }

        return view('graficociudadesform6')
        ->with('titulo', $titulo)
        ->with('precio', $precio);
    }

    public function alquileresXciudad7()
    {
        $sql = "select count(rental.rental_id) as cantidad, category.name as categoria from rental
        inner join inventory on
        rental.inventory_id = inventory.inventory_id
        inner join film on
        film.film_id = inventory.film_id
        inner join film_category on
        film_category.film_id = film.film_id
        inner join category on
        category.category_id = film_category.category_id
        group by category.name
        order by cantidad desc;";
        $consultas = DB::select($sql);
        $cantidad = [];
        $categoria = [];
        
        foreach ($consultas as $consulta) {
            array_push($cantidad, $consulta->cantidad);
        }
        foreach ($consultas as $consulta) {
            array_push($categoria, $consulta->categoria);
        }

        return view('graficociudadesform7')
        ->with('cantidad', $cantidad)
        ->with('categoria', $categoria);
    }
}
