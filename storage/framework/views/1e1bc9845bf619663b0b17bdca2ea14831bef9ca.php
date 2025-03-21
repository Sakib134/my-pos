<?php $__env->startSection('title',\App\CPU\translate('add_new_unit_type')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                    <i class="tio-add-circle-outlined"></i>
                    <span><?php echo e(\App\CPU\translate('add_new_unit_type')); ?></span>
                </h1>
            </div>
        </div>
    </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.unit.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><?php echo e(\App\CPU\translate('unit')); ?></label>
                                        <input type="text" name="unit_type" value="<?php echo e(old('unit_type')); ?>" class="form-control" placeholder="<?php echo e(\App\CPU\translate('unit')); ?>">
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h5><?php echo e(\App\CPU\translate('unit_type_table')); ?> <span class="badge badge-soft-dark"><?php echo e($units->total()); ?></span></h5>
                        </div>
                    </div>
                    <div class="table-responsive ">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('unit')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($units->firstItem()+$key); ?></td>
                                    <td>
                                        <?php echo e($unit->unit_type); ?>

                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1"
                                                   href="<?php echo e(route('admin.unit.edit',[$unit['id']])); ?>"><span class="tio-edit"></span></a>
                                        <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                           data-id="unit-<?php echo e($unit['id']); ?>"
                                           data-message="<?php echo e(\App\CPU\translate('Want to delete this unit type')); ?>?"><span class="tio-delete"></span></a>
                                        <form action="<?php echo e(route('admin.unit.delete',[$unit['id']])); ?>"
                                              method="post" id="unit-<?php echo e($unit['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <hr>
                        <table>
                            <tfoot>
                            <?php echo $units->links(); ?>

                            </tfoot>
                        </table>
                        <?php if(count($units)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 img-one-un" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('image_description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/unit/index.blade.php ENDPATH**/ ?>