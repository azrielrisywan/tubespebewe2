<?php if(isset($errors)): ?>
    <?php if(count($errors) >0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e($error); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            <?php echo session()->get('success'); ?>

        </strong>
    </div>
<?php endif; ?>


<?php if(session('error')): ?>
    <div class="alert alert-error alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/flash-message.blade.php ENDPATH**/ ?>