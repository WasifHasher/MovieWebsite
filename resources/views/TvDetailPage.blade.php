@extends('layout.main')
@section('content')


    <div class="container mt-4" x-data="{ isOpen: false }">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">

                <img src="{{ $singleRecord['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $singleRecord['poster_path'] : 'default-image.jpg' }}" class="w-100" width='340px' height='450px' alt="{{ $singleRecord['title'] ?? 'singleRecord' }}">
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-white ps-6 ps-xl-5">

             <h1>{{ $singleRecord['name'] }}</h1>

             <div class="d-flex">

                        <p><i class="fa-solid fa-star text-warning"></i> {{ $singleRecord['vote_average'] * 10 ?? 'N/A' }}% | </p> 

                        <p class="px-2">{{ $singleRecord['release_date'] ?? 'N/A' }} |</p> 

                         <p>  Fiction, anderson, Gilget</p> 
             </div>

             <div>
                <p class="mt-3 fs-6">{{ $singleRecord['overview'] ?? 'Overview not available' }}</p>

             </div>
             <h2 class='mt-5'>Featured Crew</h2>
             <div class="d-flex mt-4">
                @foreach ($singleRecord['credits']['crew'] as $item)

                @if ($loop->index < 2)
                    
                <div class=" " id="name">

                    <span class="mr-auto" >{{ $item['name']}}  </span><br>
                    <span class="">{{ $item['job']}}</span>

                </div>
                @endif
                @endforeach
             </div>
            
             @if ($singleRecord['videos']['results'] > 0)
                 
            
             <div class="mt-4 " @click="isOpen = !isOpen">


                <a href="#"  class="btn btn-danger " style="padding: 10px 25px;">Play Trailor</a>
           
                {{-- https://youtube.com/watch?v={{ $singleRecord['videos']['results'][0]['key'] }}
              --}}
           </div>
            @endif


            <div class="" style="background: rgb(58, 56, 61)" id="video" x-show="isOpen" x-show="isOpen" class="mt-2">
                <div class="">
                    <div class="clearfix">

                            <div class="float-end">
                                <button @click="isOpen = !isOpen">&times;</button>
                            </div>

                            <div class="mt-4">
                                <div class="">
                                    <iframe src="https://youtube.com/embed/{{$singleRecord['videos']['results'][0]['key']}}" width="100%" height="400" frameborder="0"></iframe>
                                </div>
                            </div>


                    </div>
                </div>
            </div>


         
       </div>
     </div>


     <br>
     <br>
     <br>
    <hr class="text-white">

    <div class="container">
        <h1 class="text-white">Cast</h1>
        <div class="row">

            @foreach ($singleRecord['credits']['cast'] as $cast)
            @if($loop->index < 5)
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 mt-3">
                <a href="{{ url('castPage',$cast['id'])}}">
                    <img src="{{ $cast['profile_path'] ? 'https://image.tmdb.org/t/p/w500' . $cast['profile_path'] : 'default-image.jpg' }}" class="w-100" width='340px' height='400px' alt="{{ $singleRecord['title'] ?? 'singleRecord' }}">
                </a>

            
            </div>
            @endif
            @endforeach
        </div>
    </div>

<hr>

   

<div class="container mt-5" x-data="{ isOpen: false, image: '' }">
    <h2 class="text-white">Images</h2>
    <div class="row">
        @foreach ($singleRecord['images']['backdrops'] as $image)
        @if($loop->index < 12)
        <div class="col-12 mt-3 col-sm-12 col-md-4 col-lg-3 col-xl-3">
            <a 
                href="#" 
                @click.prevent="isOpen = true; image = '{{ $image['file_path'] ? 'https://image.tmdb.org/t/p/w500' . $image['file_path'] : 'default-image.jpg' }}'">
                <img 
                    src="{{ $image['file_path'] ? 'https://image.tmdb.org/t/p/w500' . $image['file_path'] : 'default-image.jpg' }}" 
                    class="w-100" 
                    width="340px" 
                    height="300px" 
                    alt="{{ $singleRecord['title'] ?? 'singleRecord' }}">
            </a>
        </div>
        @endif
        @endforeach
    </div>

    <div style="background: rgb(58, 56, 61)" id="images" x-show="isOpen" class="mt-2">
        <div>
            <div class="clearfix">
                <div class="float-end">
                    <button @click="isOpen = !isOpen">&times;</button>
                </div>
                <div class="mt-4">
                    <img :src="image" width="100%" height="300px" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>






{{-- <h1>{{ $singleRecord['original_title'] ?? 'Title not available' }}</h1>
<p>{{ $singleRecord['overview'] ?? 'Overview not available' }}</p>
<p>Release Date: {{ $singleRecord['release_date'] ?? 'N/A' }}</p>
<p>Rating: {{ $singleRecord['vote_average'] ?? 'N/A' }} / 10</p>
{{-- <img src="{{ $singleRecord['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $singleRecord['poster_path'] : 'default-image.jpg' }}" alt="{{ $singleRecord['title'] ?? 'singleRecord' }}"> --}}

@endsection
