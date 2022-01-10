

<?php $__env->startSection('content'); ?>
</header>
<div class="container pt-4 mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 m-auto" style="margin: 15px auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title mb-0">Upload CSV File</h2>
                </div>
                <div class="card-body">
                    <?php
                        error_reporting(E_ALL ^ E_WARNING);
                    ?>
                    <form action="<?php echo e(route('csv.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="">CSV File</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pezesha\resources\views/csv/index.blade.php ENDPATH**/ ?>