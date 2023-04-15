

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

       <!-- contenido  -->

       <div class="herramientas">
        <?php echo $__env->yieldContent('contenido'); ?>       
       </div>
      
      
     
           <!-- contenido  -->
           <footer>
         

           </footer>
           
</body>
</html><?php /**PATH D:\softWorldTis\resources\views/layouts/menu.blade.php ENDPATH**/ ?>