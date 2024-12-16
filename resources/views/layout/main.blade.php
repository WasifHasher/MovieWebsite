<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <!-- Font Awesome Free CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <title>Document</title>
  <style>
       
        #input{
            background: rgb(72, 68, 76);
            border-radius: 20px;
            border: none;
            width: 80%;
        }
        #svg{
            position: relative;
            margin-top: 6px;
            left: 10%;
            color: rgb(141, 133, 133);
        }
        ::placeholder{
            color: white;
        }

        .trailer-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #ff0000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .trailer-button:hover {
            background-color: #cc0000;
        }

        .trailer-button i {
            margin-right: 8px;
        }

        #name:nth-child(1){
          padding-left:0px;
        }
        #name:nth-child(2){
          padding-left:20px;
        }

        #icon{
          position: absolute;
          top: 5%;
          left:2%;
        }

        #input::placeholder{
          color: gainsboro;
          opacity: 1;
        }
        
        #video{
          position: absolute;
          top: 14%;
          width: 49%;
          height: 490px;
        }
        #images{
          position: fixed;
          top: 10%;
          left: 20%;
          width: 49%;
          height: 400px;
        }


    </style>
     <livewire:styles />
     @livewireStyles

     <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body style="background: rgb(52, 48, 56);">
    
    <nav class="navbar navbar-expand-lg py-3 border-bottom" >
        <div class="container">
          <a class="navbar-brand ms-5 text-white" href="/">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link active text-white ps-3" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white ps-3" href="/Tvshow">TV Show</a>
              </li>
             
              <li class="nav-item">
                <a href="/ActorsPage" class="nav-link text-white ps-3" aria-disabled="true">Actors</a>
              </li>
            </ul>
           <livewire:filter-component>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
      </div>
      @livewireScripts

    
</body>
</html>