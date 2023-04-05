


<?php $__env->startSection('contenido'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\softWorldTis\resources\views/main.blade.php ENDPATH**/ ?>