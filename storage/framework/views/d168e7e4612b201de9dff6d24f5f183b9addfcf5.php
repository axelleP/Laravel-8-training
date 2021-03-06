<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 8 training</title>
        <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"><!-- public/css/app.css -->
    </head>
    <body>
        <div class="container-sm p-0">
            <div class="mx-xl-5 border shadow">
                <div class="bg-dark text-white text-center p-1">
                    <h1><a href="<?= url("articles/liste") ?>" class="text-reset text-decoration-none">Laravel 8 Training</a></h1>
                </div>

                <div class="min-vh-100 pt-4 pb-2 px-xs-3 px-sm-2 px-md-2 px-lg-5">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                <footer class="py-4 bg-dark text-white-50 text-center">
                    <small>Copyright &copy; Laravel 8 Training</small>
                </footer>
            </div>
        </div>
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script><!-- public/js/app.js -->
    </body>
</html><?php /**PATH C:\wamp64\www\Laravel_8_training\resources\views/layouts/app.blade.php ENDPATH**/ ?>