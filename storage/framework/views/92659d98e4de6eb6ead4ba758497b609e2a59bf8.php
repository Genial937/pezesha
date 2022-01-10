

<?php $__env->startSection('content'); ?>
</header>
    <div class="container pt-4 m-5" id="app">
        <h2>{{ progress }}</h2>
        <hr>
        <h4>{{ progressTitle }}</h4>
        <hr>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="progressPercentage"
                aria-valuemin="0" aria-valuemax="100" style="`width: ${progressPercentage}%;`">{{ progressPercentage }}%</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pezesha\resources\views/csv/progress.blade.php ENDPATH**/ ?>