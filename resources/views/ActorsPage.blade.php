@extends('layout.main')
@section('content')

    <div class="container">
        <div class="row">


        
            <h1>Popular Actors</h1>
           
          
            {{-- @if(isset($response['credits']['images']) && is_array($response['credits']['images'])) --}}
            @foreach ($response['credits']['images'] as $cast)
                @if($loop->index < 5)
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 mt-3">
                        <img src="{{ isset($cast['profile_path']) ? 'https://image.tmdb.org/t/p/w500' . $cast['profile_path'] : 'default-image.jpg' }}" 
                             class="w-100" 
                             width='340px' 
                             height='400px' 
                             alt="{{ $movie['title'] ?? 'Movie' }}">
                    </div>
                @endif
            @endforeach
        {{-- @else
            <p>No images available.</p>
        @endif --}}
        

            
            
        </div>
    </div>


@endsection