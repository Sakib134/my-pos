<?php $__env->startSection('title',\App\CPU\translate('add_new_account')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="mb-3">
            <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                <i class="tio-add-circle-outlined"></i>
                <span><?php echo e(\App\CPU\translate('add_new_account')); ?></span>
            </h1>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.account.store')); ?>" method="post" >
                            <?php echo csrf_field(); ?>
                            <div class="row pl-2" >
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" ><?php echo e(\App\CPU\translate('account_title')); ?></label>
                                        <input type="text" name="account" class="form-control" value="<?php echo e(old('account')); ?>"  placeholder="<?php echo e(\App\CPU\translate('account_title')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(\App\CPU\translate('description')); ?> </label>
                                        <input type="text" name="description" class="form-control" value="<?php echo e(old('description')); ?>"  placeholder="<?php echo e(\App\CPU\translate('description')); ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2" >
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" ><?php echo e(\App\CPU\translate('balance')); ?></label>
                                        <input type="number" step="0.01" min="0" name="balance" class="form-control" value="<?php echo e(old('balance')); ?>"  placeholder="<?php echo e(\App\CPU\translate('initial_balance')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" ><?php echo e(\App\CPU\translate('account_number')); ?></label>
                                        <input type="text" name="account_number" class="form-control" value="<?php echo e(old('account_number')); ?>"  placeholder="<?php echo e(\App\CPU\translate('account_number')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/account/add.blade.php ENDPATH**/ ?>