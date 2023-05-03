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
                    <span class="titulo">Registro de administrador</span>
                </div>
                <form action="/login/registrarAdministrador" method="Post">
                    @csrf
                    <div class="Usuario">
                        <span class="nombre">Ingrese un usuario</span>
                        <input type="text"  class="linea" name="name" >
                        @error('name')
                        <b class="error" >{{$message}}<b>
                       @enderror
                    </div>
                    <div class="Contraseña">
                        <span class="contra">Ingrese una contraseña</span>
                        <input type="text" class="linea" name="password" >
                        @error('password')
                        <b class="error" >{{$message}}<b>
                       @enderror
                    </div>
                    <div class="botones">
                        <a id="link" href="{{('/login')}}"> 
                        <div class="registrarse">
                            <button type="button" class="button">
                                <p>Cancelar</p>
                            </button>
                        </div>
                        </a>
                        <div type="submit" class="registrar" >
                            <button class="button">
                                <p>Registrar</p>
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