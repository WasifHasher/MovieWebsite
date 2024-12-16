<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
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

   public $movie= '';

    public function show($id)
    {
         $apiKey = env('TMDB_API_KEY'); // Store API key in `.env` for security
        $movie = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=ee581eca07fb4f90003a51de29ce9f3a&append_to_response=credits,videos,images")->json();

        // dd($movie);

        return view('detail',[
            'movie' => $movie,
        ]);
       
    }
    

   
    

    public function getAllActors()
    {
        $response;
    // Fetch the API key from the .env file for security
  

    $response = Http::get("https://api.themoviedb.org/3/person/popular", [
        'api_key' => env('TMDB_API_KEY'),
        'append_to_response' => 'credits,images',
    ])->json();
       
    // dd($response);

    // Pass the actor details to the view
     return view('ActorsPage', compact('response'));
    }


    public $age;
   
    public function castPage($id)
{
    $apiKey = 'ee581eca07fb4f90003a51de29ce9f3a';

    // Fetch person details and related data
    $personResponse = Http::get("https://api.themoviedb.org/3/person/$id", [
        'api_key' => $apiKey,
        'append_to_response' => 'credits,images',
    ]);

    // $film_images =Http::withToken(config('services.tmdb.token'))
    // ->get('https://api.themoviedb.org/3/movie/popular?api_key=ee581eca07fb4f90003a51de29ce9f3a')
    // ->json()['results'];

    // Ensure the response is valid
    if ($personResponse->failed()) {
        abort(404, 'Person not found'); // Handle API failure gracefully
    }

    $person = $personResponse->json();

    // Calculate age if birthday is available
    $age = null;
    if (isset($person['birthday'])) {
        $birthDate = new \DateTime($person['birthday']);
        $today = new \DateTime();
        $age = $today->diff($birthDate)->y;
    }

    // Fetch social links
    $socialLinksResponse = Http::get("https://api.themoviedb.org/3/person/$id/external_ids", [
        'api_key' => $apiKey,
    ]);

    $socialLinks = $socialLinksResponse->successful() ? $socialLinksResponse->json() : [];

    // Return view with data
    return view('castPage', [
        'person' => $person,
        'age' => $age,
        'social_links' => $socialLinks,
        'images' => $person['images'] ?? [], // Use the appended 'images' data
    ]);
}




}