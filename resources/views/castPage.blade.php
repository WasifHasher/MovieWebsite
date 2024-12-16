@extends('layout.main')
@section('content')
    

    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <img src="{{ $person['profile_path'] ? 'https://image.tmdb.org/t/p/w500' . $person['profile_path'] : 'default-image.jpg' }}" height="450" alt="">
                
                
                    
                <ul class="d-flex justify-content-between p-0 m-0 mt-3">
                    @if ($social_links)
                        
                    <li class="list-unstyled text-white fs-3 ms-0 ps-0"><a href="{{$social_links['facebook_id']}}" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                    @endif

                    @if(!$social_links)
                    <li class="list-unstyled text-white fs-3 px-2"><a href="{{$social_links['instagram_id']}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    @endif

                    @if($social_links)
                    <li class="list-unstyled text-white fs-3"><a href="{{$social_links['tiktok_id']}}"><i class="fa-brands fa-tiktok"></i></a></li>
                    @endif
                    @if($social_links)
                    <li class="list-unstyled text-white fs-3 px-2"><a href="{{$social_links['youtube_id']}}"><i class="fa-brands fa-youtube"></i></a></i></li>
                    @endif
                    @if($social_links)
                    <li class="list-unstyled text-white fs-3"><a href="{{$social_links['twitter_id']}}"><i class="fa-brands fa-twitter"></i></a></li>
                    @endif
                </ul>
               
               
            </div>
            <div class="col-8 ps-5">

                <h2 class="text-white">{{$person['name']}}</h2><br>

                <div class="d-flex" style="margin-top: -25px;">

                    <span class="text-white">{{$person['birthday']}}</span><br>
                    @if($age)
                        
                    <span class="text-white mx-2">({{$age}})</span><br>
                    @else
                    <span class="text-white">There is no Age,</span>
                    @endif
                    <span class="text-white ps-2">{{$person['place_of_birth']}}</span><br>
                </div>

                <div class="mt-4 text-white">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit expedita dolor repudiandae distinctio aperiam dolorum corporis cum reiciendis a voluptatum beatae aliquam recusandae fugiat, nisi totam ab harum. Consequuntur quo nihil perferendis iure deserunt doloremque ut harum! Aut odio, reprehenderit quam laborum rerum quas ex neque, ab eligendi, pariatur maiores cumque officia deserunt incidunt architecto dicta velit voluptas dolorem eum explicabo ea earum expedita. Quibusdam eligendi odit, earum nulla perspiciatis impedit laudantium aut consequuntur rerum necessitatibus alias excepturi dolore eveniet quaerat, esse et totam fugiat nihil suscipit provident voluptatem autem incidunt, sed non. Maiores dicta inventore eos tenetur molestiae amet!</p>
                </div>


                <div class=" d-flex">
                    @foreach ($person['credits']['cast'] as $movie)
                        @if($loop->index < 5)
                            <a href="#"> <!-- Add a meaningful href, e.g., link to movie details -->
                                <img 
                                    src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : asset('images/default-movie.jpg') }}" 
                                    class="w-100  p-2" 
                                    width="250px" 
                                    height="300px" 
                                    >
                            </a>
                        @endif
                    @endforeach
                </div>
                

            </div>
        </div>
    </div>


    {{-- <p class="text-white">what's wrong here.</p> --}}


@endsection