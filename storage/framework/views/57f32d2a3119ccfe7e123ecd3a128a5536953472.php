<?php $__env->startSection('title', 'Page title'); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e(__('Main Page')); ?></h1>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel_base\resources\views/index.blade.php ENDPATH**/ ?>