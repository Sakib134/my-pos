<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('Please proceed step by step with proper data according to instructions')); ?></h6>
    </div>
    <div class="pb-2">
        <div class="progress cursor-pointer" role="progressbar" aria-label="Grofresh Software Installation"
             aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="<?php echo e(\App\CPU\translate('Fourth Step')); ?>!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 80%"></div>
        </div>
    </div>
    <div class="card mt-4 position-relative">
        <div class="d-flex justify-content-end mb-2 position-absolute top-end">
            <a href="#" class="d-flex align-items-center gap-1">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="Click on the section to automatically import database">
                            <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info.svg" alt=""
                                 class="svg">
                        </span>
            </a>
        </div>
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase"><?php echo e(\App\CPU\translate('Step 4')); ?>. </h5>
                <h5 class="fw-normal"><?php echo e(\App\CPU\translate('Import Database')); ?></h5>
            </div>
            <p class="mb-5">
                <?php echo e(\App\CPU\translate('Your Database has been connected ! Just click on the section to automatically import database')); ?>

            </p>

            <?php if(session()->has('error')): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php echo e(\App\CPU\translate('Your database is not clean, do you want to clean database then import')); ?>?
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="<?php echo e(route('force-import-sql')); ?>" class="btn btn-danger px-sm-5" onclick="showLoder()">
                        <?php echo e(\App\CPU\translate('Force Import Database')); ?></a>
                </div>
            <?php else: ?>
                <div class="text-center">
                    <a href="<?php echo e(route('import_sql',['token'=>bcrypt('step_5')])); ?>" class="btn btn-dark px-sm-5"
                       onclick="showLoder()"><?php echo e(\App\CPU\translate('Click Here')); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script type="text/javascript">
        function showLoder() {
            $('#loading').fadeIn();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step4.blade.php ENDPATH**/ ?>