<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('Please proceed step by step with proper data according to instructions')); ?></h6>
    </div>
    <div class="pb-2">
        <div class="progress cursor-pointer" role="progressbar" aria-label="Grofresh Software Installation"
             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="First Step!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 20%"></div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex justify-content-end mb-2">
                <a href="https://docs.6amtech.com/docs-six-pos/intro" class="d-flex align-items-center gap-1"
                   target="_blank">
                    <?php echo e(\App\CPU\translate('Read Documentation')); ?>

                    <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                          data-bs-title="<?php echo e(\App\CPU\translate('Follow our documentation')); ?>">
                        <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info.svg" class="svg" alt="">
                    </span>
                </a>
            </div>

            <div class="d-flex align-items-center column-gap-3 flex-wrap mb-4">
                <h5 class="fw-bold fs text-uppercase"><?php echo e(\App\CPU\translate('Step 1')); ?>. </h5>
                <h5 class="fw-normal"><?php echo e(\App\CPU\translate('Check & Verify File Permissions')); ?></h5>
            </div>

            <div class="bg-light p-4 rounded mb-4">
                <h6 class="fw-bold text-uppercase fs m-0 letter-spacing  mb-4 pb-sm-3" style="--fs: 14px">
                    <?php echo e(\App\CPU\translate('Required Database Information')); ?>

                </h6>

                <div class="px-xl-2 pb-sm-3">
                    <div class="row g-4 g-md-5">
                        <div class="col-md-4">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/php-version.svg')); ?>"
                                     alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                <div
                                    class="d-flex align-items-center gap-2 justify-content-between flex-grow-1">
                                    <?php echo e(\App\CPU\translate('PHP Version')); ?> 8.0 +

                                    <?php ($phpVersion = number_format((float)phpversion(), 2, '.', '')); ?>
                                    <?php ($phpVersionMatched = $phpVersion >= 8.0); ?>
                                    <?php if($phpVersionMatched): ?>
                                        <img width="20" src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/check.png')); ?>"
                                             alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                    <?php else: ?>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true" data-bs-delay='{"hide":1000}'
                                              data-bs-title="Your php version in server is lower than 8.0 version
                                                   <a href='https://support.cpanel.net/hc/en-us/articles/360052624713-How-to-change-the-PHP-version-for-a-domain-in-cPanel-or-WHM'
                                                   class='d-block' target='_blank'>See how to update</a> ">
                                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/info.svg')); ?>"
                                                     class="svg text-danger" alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                            </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/curl-enabled.svg')); ?>"
                                         alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                    <div
                                        class="d-flex align-items-center gap-2 justify-content-between flex-grow-1">
                                        <?php echo e(\App\CPU\translate($key) . ' ' . \App\CPU\translate('Enabled')); ?>


                                        <?php if($item): ?>
                                            <img width="20" src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/check.png')); ?>"
                                                 alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                        <?php else: ?>
                                            <span class="cursor-pointer" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                  data-bs-html="true" data-bs-delay='{"hide":1000}'
                                                  data-bs-title="Curl extension is not enabled in your server. To enable go to PHP version > extensions and select curl.">
                                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/info.svg')); ?>"
                                                     class="svg text-danger"  alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                            </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-4">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/route-service.svg')); ?>"
                                     alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                <div
                                    class="d-flex align-items-center gap-2 justify-content-between flex-grow-1">
                                    <?php echo e(\App\CPU\translate('.env File Permission')); ?>


                                    <?php if($permission['db_file_write_perm']): ?>
                                        <img width="20" src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/check.png')); ?>"
                                             alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                    <?php else: ?>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true" data-bs-delay='{"hide":1000}'
                                              data-bs-title="Provide file permission for write">
                                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/info.svg')); ?>"
                                                     class="svg text-danger" alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/route-service.svg')); ?>"
                                     alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                <div class="d-flex align-items-center gap-2 justify-content-between flex-grow-1">
                                    <?php echo e(\App\CPU\translate('RouteServiceProvider.php File Permission')); ?>

                                    <?php if($permission['routes_file_write_perm']): ?>
                                        <img width="20"
                                             src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/check.png')); ?>"
                                             alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                    <?php else: ?>
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                              data-bs-html="true" data-bs-delay='{"hide":1000}'
                                              data-bs-title="Provide file permission for write">
                                                <img src="<?php echo e(asset('public/assets/installation/assets/img/svg-icons/info.svg')); ?>"
                                                     class="svg text-danger"  alt="<?php echo e(\App\CPU\translate('image')); ?>">
                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <p><?php echo e(\App\CPU\translate('All the permissions are provided successfully')); ?> ? </p>

                <?php if(array_product($permission) && $phpVersionMatched): ?>
                    <a href="<?php echo e(route('step2',['token'=>bcrypt('step_2')])); ?>" class="btn btn-dark px-sm-5"><?php echo e(\App\CPU\translate('Proceed Next')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step1.blade.php ENDPATH**/ ?>