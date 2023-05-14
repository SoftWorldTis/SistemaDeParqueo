<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('/dash/css/login.css')}}" >





</head>
<header class="cabeza">

</header>
<body>
   
    <div class="fondo">

        
        <div class="contenedorlogin">
            <div class="izquierda">
                <div class="tit">
                    <span class="titulo">Login</span>
                </div>
                <form action="/login" method="Post">
                    @csrf
                    <div class="Usuario">
                        <span class="nombre">Usuario</span>
                        <input type="text"  class="linea" name="name" >
                    </div>
                    <div class="Contraseña">
                        <span class="contra">Contraseña</span>
                        <input type="text" class="linea" name="password" >
                    </div>
                    <div class="botones">
                        <a id="link" href="{{/login/RegistroCliente}}"> 
                        <div class="registrarse">
                            <button type="button" class="button">
                                <p>Registrar</p>
                            </button>
                        </div>
                        </a>
                        <div type="submit" class="ingresar" >
                            <button class="button">
                                <p>Ingresar</p>
                            </button>
                        </div>
                    </div>
                 </form>

                </div>
                
                <div class="derecha">
                    <img src="{{asset('/dash/assets/autoparqueo.png')}}" alt="Logo Parqueo" class="imagen">
                </div>
                
            </div>
            
        </div>
        
    </body>
    
</html>