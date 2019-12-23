<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php if(!empty($meta_title)): ?><?php echo e($meta_title); ?> <?php else: ?> Home | E-Shopper <?php endif; ?></title>
    <?php if(!empty($meta_description)): ?><meta name="description" content="<?php echo e($meta_description); ?>"><?php endif; ?>

    <?php if(!empty($meta_keywords)): ?><meta name="keywords" content="<?php echo e($meta_keywords); ?>"><?php endif; ?>

    <link href="<?php echo e(asset('css/frontend_css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/animate.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/frontend_css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/frontend_css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/easyzoom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend_css/passtrength.css')); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cc08788f3971d0012e248e5&product=inline-share-buttons' async='async'></script>
</head><!--/head-->

<body>
	<?php echo $__env->make('layouts.frontLayout.front_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<?php echo $__env->yieldContent('content'); ?>
	
	<?php echo $__env->make('layouts.frontLayout.front_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js/frontend_js/jquery.js')); ?>"></script>
	<script src="<?php echo e(asset('js/frontend_js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/frontend_js/jquery.scrollUp.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/frontend_js/price-range.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend_js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend_js/easyzoom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend_js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend_js/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend_js/passtrength.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>"></script> -->
    <scipt src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></scipt>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    
</body>

</html><?php /**PATH D:\Atp 3\Laravel\Final_project_laravel_pocket_pharma\PocketPharmacyLaravel\resources\views/layouts/frontLayout/front_design.blade.php ENDPATH**/ ?>