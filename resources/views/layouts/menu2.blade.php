

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('/dash/css/menu2.css')}}" >
    <link rel="icon" href="{{asset('/dash/assets/logo40.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- header   -->
  <header>
 @include('layouts.header2')

  </header>

    <!-- header   -->

       <!-- contenido  -->
       <div class="fondo">
         <div class="herramientas">
            @yield('contenido')
  
          </div>
       </div>
       <div class="AbBotones">
        @yield('botones')
       </div>

      
     
           <!-- contenido  -->
           <footer>
         

           </footer>
</body>
</html>