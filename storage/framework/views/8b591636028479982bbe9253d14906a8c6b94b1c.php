

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="<?php echo e(asset('/dash/css/menu.css')); ?>" >
    <link rel="icon" href="<?php echo e(asset('/dash/assets/logo40.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- header   -->
  <header>
 <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </header>

    <!-- header   -->
     <div class="herramientas">
    
            <div class="parqueos">
                <img src="<?php echo e(asset('/dash/assets/p 1.png')); ?>" class="iconParqueos" alt="">
                <div class="botonParqueo">
                    <p>Ver Parqueos</p>
                </div>
            </div>

            <div class="registrar">
                <img src="<?php echo e(asset('/dash/assets/documento icono 1.png')); ?>" class="iconRegistrar" alt="">
                <div class="botonRegistro">
                    <p>Registrar</p>
                </div>
            </div>

            <div class="usuarios">
                <img src="<?php echo e(asset('/dash/assets/user 3.png')); ?>" class="iconUsuario" alt="">
                <div class="botonUsuario">
                    <p>Usuarios</p>
                </div>
            </div>

            <div class="reclamos">
                <img src="<?php echo e(asset('/dash/assets/queja 1rec .png')); ?>" class="iconReclamos" alt="">
                <div class="botonReclamo">
                    <p>Reclamos</p>
                </div>
            </div>

            <div class="alquiler">
                <img src="<?php echo e(asset('/dash/assets/dia-de-pago 1 .png')); ?>" class="iconAlquilar" alt="">
                <div class="botonAlquilo">
                    <p>Alquiler</p>
                </div>
            </div>

            <div class="salir">
                <img src="<?php echo e(asset('/dash/assets/cerrar-sesion 1.png')); ?>" class="iconSalir" alt="">
                <div class="botonSalo">
                    <p>Salir</p>
                </div>
            </div>
            
     </div>
     
</body>
</html><?php /**PATH D:\softWorldTis\resources\views/menu.blade.php ENDPATH**/ ?>