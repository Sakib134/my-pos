<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('All Done, Great Job. Your software is ready to run')); ?>.</h6>
    </div>

    <div class="card mt-4">
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="p-4 rounded mb-4 text-center">
                <h5 class="fw-bold"><?php echo e(\App\CPU\translate('Configure the following setting to run the system properly')); ?></h5>

                <ul class="list-group mar-no mar-top bord-no">
                    <li class="list-group-item"><?php echo e(\App\CPU\translate('Business Setting')); ?></li>
                </ul>
            </div>

            <div class="text-center">
                <a href="<?php echo e(env('APP_URL')); ?>/admin/auth/login" target="_blank" class="btn btn-dark px-sm-5"><?php echo e(\App\CPU\translate('Admin Panel')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step6.blade.php ENDPATH**/ ?>