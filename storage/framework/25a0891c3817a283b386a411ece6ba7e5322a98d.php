<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('Please proceed step by step with proper data according to instructions')); ?></h6>
    </div>

    <div class="pb-2 px-2 px-sm-5 mx-xl-4">
        <div class="progress cursor-pointer" role="progressbar" aria-label="<?php echo e(\App\CPU\translate('Grofresh Software Installation')); ?>"
             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="<?php echo e(\App\CPU\translate('Intro Step')); ?>!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 0%"></div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="p-4 my-md-3 mx-xl-4 px-md-5">
            <p class="text-center mb-4 top-info-text"><?php echo e(\App\CPU\translate('Before starting the installation process please collect this
                information. Without this information, you won’t be able to complete the installation process')); ?></p>

            <div class="bg-light p-4 rounded mb-4">
                <div class="d-flex justify-content-between gap-1 align-items-center flex-wrap mb-4 pb-sm-3">
                    <h6 class="fw-bold text-uppercase fs m-0 letter-spacing" style="--fs: 14px"><?php echo e(\App\CPU\translate('Required
                        Database Information')); ?>

                    </h6>
                    <a href="https://docs.6amtech.com/docs-six-pos/admin-panel/install-on-server"
                       target="_blank"><?php echo e(\App\CPU\translate('Where to get this information')); ?>?</a>
                </div>

                <div class="px-md-4 pb-sm-3">
                    <div class="row gy-sm-5 g-4">
                        <div class="col-sm-6">
                            <div class="d-flex gap-4 align-items-center flex-wrap">
                                <img
                                    src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/database-name.svg"
                                    alt="">
                                <div><?php echo e(\App\CPU\translate('Database Name')); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex gap-4 align-items-center flex-wrap">
                                <img
                                    src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/database-password.svg"
                                    alt="">
                                <div><?php echo e(\App\CPU\translate('Database Password')); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex gap-4 align-items-center flex-wrap">
                                <img
                                    src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/database-username.svg"
                                    alt="">
                                <div><?php echo e(\App\CPU\translate('Database Username')); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex gap-4 align-items-center flex-wrap">
                                <img
                                    src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/database-hostname.svg"
                                    alt="">
                                <div><?php echo e(\App\CPU\translate('Database Host Name')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <p><?php echo e(\App\CPU\translate('Are you ready to start installation process')); ?> ?</p>

                <a href="<?php echo e(route('step1',['token'=>bcrypt('step_1')])); ?>" class="btn btn-dark px-sm-5">
                    <?php echo e(\App\CPU\translate('Get Started')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step0.blade.php ENDPATH**/ ?>