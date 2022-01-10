

<?php $__env->startSection('content'); ?>
    <!-- about -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div>
                    <img src="<?php echo e($character->thumbnail->path); ?>.<?php echo e($character->thumbnail->extension); ?>" alt="">
                </div>
                <div class="about-text">
                    <div class="title">
                        <h2><?php echo e($character->name); ?></h2>
                        
                    </div>
                    <p><?php echo e($character->description); ?></p>

                    <h2 style="font-weight: bold">Series</h2>
                    <ul>
                        <?php if(count($character->series->items) > 0): ?>
                            <?php $__currentLoopData = $character->series->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($serie->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li>No series found under this character!</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <br>
            <hr>
            <div class="about-box">
                <div class="box1">
                    <div class="content">
                        <h2 style="font-weight: bold">Comics</h2>
                        <ul>
                            <?php if(count($character->comics->items) > 0): ?>
                                <?php $__currentLoopData = $character->comics->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($comic->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li>No Comics found under this character!</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="box2">
                    <h2 style="font-weight: bold">Stories</h2>
                    <ul>
                        <?php if(count($character->stories->items) > 0): ?>
                            <?php $__currentLoopData = $character->stories->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($story->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li>No Stories found under this character!</li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="box3">
                    <h2 style="font-weight: bold">Events</h2>
                    <ul>
                        <?php if(count($character->events->items) > 0): ?>
                            <?php $__currentLoopData = $character->events->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($event->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li>No Events found under this character!</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end of about -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pezesha\resources\views/show.blade.php ENDPATH**/ ?>