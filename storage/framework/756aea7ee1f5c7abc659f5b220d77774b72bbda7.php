<?php $__env->startSection('content'); ?>
    <div class="text-center text-white mb-4">
        <h2><?php echo e(\App\CPU\translate('6POS Software Installation')); ?></h2>
        <h6 class="fw-normal"><?php echo e(\App\CPU\translate('Please proceed step by step with proper data according to instructions')); ?></h6>
    </div>

    <div class="pb-2">
        <div class="progress cursor-pointer" role="progressbar" aria-label="Grofresh Software Installation"
             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip"
             data-bs-placement="top" data-bs-custom-class="custom-progress-tooltip" data-bs-title="<?php echo e(\App\CPU\translate('Third Step')); ?>!"
             data-bs-delay='{"hide":1000}'>
            <div class="progress-bar" style="width: 60%"></div>
        </div>
    </div>

    <div class="card mt-4 position-relative">
        <div class="d-flex justify-content-end mb-2 position-absolute top-end">
            <a href="#" class="d-flex align-items-center gap-1">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="<?php echo e(\App\CPU\translate('Follow our documentation')); ?>">

                            <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/info.svg" alt=""
                                 class="svg">
                        </span>
            </a>
        </div>
        <div class="p-4 mb-md-3 mx-xl-4 px-md-5">
            <div class="d-flex align-items-center column-gap-3 flex-wrap">
                <h5 class="fw-bold fs text-uppercase"><?php echo e(\App\CPU\translate('Step 3')); ?>. </h5>
                <h5 class="fw-normal"><?php echo e(\App\CPU\translate('Update Database Information')); ?></h5>
            </div>
            <p class="mb-4"><?php echo e(\App\CPU\translate('Provide your database information')); ?>.
                <a href="https://docs.6amtech.com/docs-six-pos/admin-panel/install-on-server" target="_blank">
                    <?php echo e(\App\CPU\translate('Where to get this information')); ?> ?</a>
            </p>

            <?php if(isset($error) || session()->has('error')): ?>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php echo e(\App\CPU\translate('Invalid Database Credentials or Host. Please check your database credentials carefully')); ?>.
                        </div>
                    </div>
                </div>
            <?php elseif(session()->has('success')): ?>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <strong><?php echo e(session('success')); ?></strong>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('install.db',['token'=>bcrypt('step_4')])); ?>">
                <?php echo csrf_field(); ?>
                <div class="bg-light p-4 rounded mb-4">
                    <div class="px-xl-2 pb-sm-3">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="database-host"
                                           class="d-flex align-items-center gap-2 mb-2"><?php echo e(\App\CPU\translate('Database Host')); ?></label>
                                    <input type="text" id="database-host" class="form-control" name="DB_HOST"
                                           required
                                           placeholder="<?php echo e(\App\CPU\translate('Ex: localhost')); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="database-name"
                                           class="d-flex align-items-center gap-2 mb-2"><?php echo e(\App\CPU\translate('Database Name')); ?></label>
                                    <input type="text" id="database-name" class="form-control" name="DB_DATABASE"
                                           required
                                           placeholder="<?php echo e(\App\CPU\translate('Ex: project-name-db')); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="database-username"
                                           class="d-flex align-items-center gap-2 mb-2"><?php echo e(\App\CPU\translate('Database Username')); ?></label>
                                    <input type="text" id="database-username" class="form-control"
                                           name="DB_USERNAME" required
                                           placeholder="<?php echo e(\App\CPU\translate('Ex: root')); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="database-password" class="d-flex align-items-center gap-2 mb-2"><?php echo e(\App\CPU\translate('Database Password')); ?></label>
                                    <div class="input-inner-end-ele position-relative">
                                        <input type="password" id="database-password" min="8"
                                               autocomplete="new-password" class="form-control" name="DB_PASSWORD"
                                               required
                                               placeholder="<?php echo e(\App\CPU\translate('Ex: password')); ?>">
                                        <div class="togglePassword">
                                            <img
                                                src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/eye.svg"
                                                alt="" class="svg eye">
                                            <img
                                                src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/svg-icons/eye-off.svg"
                                                alt=""
                                                class="svg eye-off">
                                        </div>
                                    </div>
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

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/installation/step3.blade.php ENDPATH**/ ?>