<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('Please proceed step by step with proper data according to instructions')); ?></h6>
    </div>

    <div class="pb-2">
        <div class="progress cursor-pointer" role="progressbar" aria-label="Grofresh Software Installation"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="<?php echo e(\App\CPU\translate('Second Step')); ?>!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 40%"></div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex justify-content-end mb-2">
                <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"
                   class="d-flex align-items-center gap-1" target="_blank">
                    Where to get this information?
                    <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                          data-bs-title="<?php echo e(\App\CPU\translate('Purchase code information')); ?>">
                                <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info.svg" alt=""
                                     class="svg">
                            </span>
                </a>
            </div>

            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase">Step 2. </h5>
                <h5 class="fw-normal"><?php echo e(\App\CPU\translate('Update Purchase Information')); ?></h5>
            </div>
            <p class="mb-4"><?php echo e(\App\CPU\translate('Provide your')); ?> <strong><?php echo e(\App\CPU\translate('username')); ?> </strong><?php echo e(\App\CPU\translate('of codecanyon & the')); ?> <strong><?php echo e(\App\CPU\translate('purchase code')); ?></strong></p>

            <form method="POST" action="<?php echo e(route('purchase.code',['token'=>bcrypt('step_3')])); ?>">
                <?php echo csrf_field(); ?>
                <div class="bg-light p-4 rounded mb-4">

                    <div class="px-xl-2 pb-sm-3">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="username" class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-medium"><?php echo e(\App\CPU\translate('Username')); ?></span>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true"
                                              data-bs-title="<?php echo e(\App\CPU\translate('The username of your codecanyon account')); ?>">
                                                    <img
                                                        src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info2.svg"
                                                        class="svg" alt="">
                                        </span>
                                    </label>
                                    <input type="text" id="username" class="form-control" name="username"
                                           placeholder="<?php echo e(\App\CPU\translate('Ex: John Doe')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="purchase_key" class="mb-2">
                                        <span class="fw-medium">Purchase Code</span>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true"
                                              data-bs-title="<?php echo e(\App\CPU\translate('The purchase code')); ?>">
                                                    <img
                                                        src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info2.svg"
                                                        class="svg" alt="">
                                        </span>
                                    </label>
                                    <input type="text" id="purchase_key" class="form-control" name="purchase_key"
                                           placeholder="Ex: 19xxxxxx-ca5c-49c2-83f6-696a738b0000" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark px-sm-5"><?php echo e(\App\CPU\translate('Continue')); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step2.blade.php ENDPATH**/ ?>