<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TvController extends Controller
{
    public function index(){

        $popularTvshow =Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?api_key=ee581eca07fb4f90003a51de29ce9f3a')
        ->json()['results'];

       
        
        $topRated =Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/top_rated?api_key=ee581eca07fb4f90003a51de29ce9f3a')
        ->json()['results'];

        return view('Tvshow',[
            'popularTvshow' => $popularTvshow,
            'topRated' => $topRated
        ]);
    }

    public function Tvdetails($id){


        $singleRecord = Http::get("https://api.themoviedb.org/3/tv/$id?api_key=ee581eca07fb4f90003a51de29ce9f3a&append_to_response=credits,videos,images")->json();

        return view('TvDetailPage',[
            'singleRecord' => $singleRecord
        ]);
    }
}
