<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('/dash/css/inicio.css')}}" >


</head>
<header class="cabeza">

</header>
<body>
   
    <div class="fondo">

        
            <div class="contenedorinicio">
                <div class="titulo">
                     <p>Bienvenido</p>
                 <p>Seleccione su cargo</p>
                </div>
                <div class="botones">

                    <div class="logadmin">
                        <img src="{{asset('/dash/assets/adminicon.png')}}" class="iconRegistrarAd " alt="">
                        <a id="link" href="{{('/login')}}">
                            <div class="usuario">
                                <button class="button">
                                    <p>Administrador</p>
                                </button>
                                
                            </div>
                        </a>
                    </div>
                    <div class="logguardia">
                        <img src="{{asset('/dash/assets/guardia.png')}}" class="iconRegistrarAd " alt="">
                        <a id="link" href="">
                            <div class="usuario">
                                <button class="button">
                                    <p>Guardia</p>
                                </button>
                                
                            </div>
                        </a>
                    </div>
                    <div class="logcli">
                        <img src="{{asset('/dash/assets/cliente.png')}}" class="iconRegistrarAd" alt="">
                        <a id="link" href="">
                            <div class="usuario">
                                <button class="button">
                                    <p>Cliente</p>
                                </button>
                                
                            </div>
                        </a>
                    </div>
                </div>
                    
                    
                </div>
                
                
            </div>
            
            
        </body>
        
</html>