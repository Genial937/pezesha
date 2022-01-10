

<?php $__env->startSection('content'); ?>
<div class="banner">
  <div class="container">
      <h1 class="banner-title">
          <span>Pezesha.</span> Interview Test.
      </h1>
      <p>Characters fetched from Marvel API. When you click view more you see the details of that particular
          character.</p>
  </div>
</div>
</header>
    <!-- blog -->
    <section class = "blog" id = "blog">
        <div class = "container">
          <div class = "title">
            <h2>All Characters</h2>
            <p>All characters fetched and paginated to 6 per page</p>
          </div>
          <div class = "blog-content">
            <!-- item -->
           <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class = "blog-item">
              <div class = "blog-img">
                <img src = "<?php echo e($character->thumbnail->path); ?>.<?php echo e($character->thumbnail->extension); ?>"  alt = "">
                <span><i class = "far fa-heart"></i></span>
              </div>
              <div class = "blog-text">
                <span><?php echo e(date('M d, Y', strtotime($character->modified))); ?></span>
                <h2><?php echo e($character->name); ?></h2>
                <p><?php echo e($character->description); ?></p>
                <a href = "single/character/<?php echo e($character->id); ?>">View More</a>
              </div>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- end of item -->
            
          </div>
          <?php echo e($characters->links()); ?>

        </div>
      </section>
      <!-- end of blog -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pezesha\resources\views/home.blade.php ENDPATH**/ ?>