@extends('layout.main')
@section('content')

    <div class="container">
        <div class="row">

            @foreach ($popularMovies as $movie)
            <div class="col-12 mt-5 col-sm-6 col-md-6 col-lg-4 col-xl-3">

                <div class="w-100">
                    <a href="{{ url('details/'.$movie['id'])}}">
                    <img src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] : 'image/film_11.jpg' }}" class="w-100" style="width: 200px;height:240px;">
                    </a>
                </div>

                
                <h5 class="text-white pt-1">{{ $movie['title'] }}</h5>
                
                <div class="flex" style="margin-top: -5px;">
                    <span class="text-white"> <i class="fa-solid fa-star text-warning pe-1" style="font-size: 12px;"></i>{{ $movie['vote_average'] * 10}}% |</span>
                    <span class="text-white" style="font-size: 12px;">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                </div>
                <div>
                    <p class="text-white w-75" style="font-size: 12px;">  {{ \Illuminate\Support\Str::words($movie['overview'], 20, '...') }}</p>
                </div>
            </div>
        @endforeach


            <h2 class="text-white mt-4">Now Playing</h2>

            @forelse ($nowplaying as $movie)
            <div class="col-12 mt-5 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="w-100">
                    <a href="{{ url('details/'.$movie['id'])}}">
                    <img src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] : 'image/film_11.jpg' }}" class="w-100" style="width: 200px;height:240px;">
                    </a>
                </div>
                <h5 class="text-white pt-1">{{ $movie['title'] }}</h5>
                <div class="flex" style="margin-top: -5px;">
                    <span class="text-white"> <i class="fa-solid fa-star text-warning pe-1" style="font-size: 12px;"></i>{{ $movie['vote_average'] * 10}}% |</span>
                    <span class="text-white" style="font-size: 12px;">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                </div>
                <div>
                    <p class="text-white w-75" style="font-size: 12px;">{{ \Illuminate\Support\Str::words($movie['overview'], 20, '...') }}</p>
                </div>
            </div>
        @empty
            <p class="text-white">No movies available at the moment.</p>
        @endforelse
        

            <div class="col-12 mt-5 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="w-100">
                    <img src="image\film_5.jpg" class="w-100" style="width: 200px;height:240px;">
                </div>
                <h5 class="text-white pt-1">Name</h5>
                <div class="flex" style="margin-top: -5px;">
                    <span class="text-white"> <i class="fa-solid fa-star text-warning pe-1" style="font-size: 12px;"></i>85% |</span>
                    <span class="text-white" style="font-size: 12px;">Feb 8,2024</span>
                </div>
                <div><p class="text-white w-75 " style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus deserunt.</p></div>
            </div>

            <div class="col-12 mt-5 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="w-100">
                    <img src="image\film_12.jpg" class="w-100" style="width: 200px;height:240px;">
                </div>
                <h5 class="text-white pt-1">Name</h5>
                <div class="flex" style="margin-top: -5px;">
                    <span class="text-white"> <i class="fa-solid fa-star text-warning pe-1" style="font-size: 12px;"></i>85% |</span>
                    <span class="text-white" style="font-size: 12px;">Feb 8,2024</span>
                </div>
                <div><p class="text-white w-75 " style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus deserunt.</p></div>
            </div>

            
        </div>
    </div>
@endsection