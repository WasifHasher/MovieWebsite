<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
      public $nowplaying = [];
    public function index(){

        $popularMovies =Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?api_key=ee581eca07fb4f90003a51de29ce9f3a')
        ->json()['results'];

       
        
        $nowplaying =Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=ee581eca07fb4f90003a51de29ce9f3a')
        ->json()['results'];


        // dd($nowplaying);
        


        return view('index',compact('popularMovies','nowplaying'));


    }


   
}
