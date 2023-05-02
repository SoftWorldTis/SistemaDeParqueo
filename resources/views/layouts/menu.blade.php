

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('/dash/css/menu.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/header.css')}}" >
    @yield('css')

    
    <link rel="icon" href="{{asset('/dash/assets/logo40.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="jquery.fittext.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

  </head>
<body  id="body">
  <!-- header   -->
  <header>
 @include('layouts.header')

  </header>

    <!-- header   -->

       <!-- contenido  -->
       <div class="fondo" id="fondo">
     
        @yield('contenido')


   </div>

     
           <!-- contenido  -->
           <footer>
         

           </footer>


           @yield('scripts')
         
</body>


</html>