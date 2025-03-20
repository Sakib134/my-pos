<?php $__env->startSection('title',\App\CPU\translate('supplier_details')); ?>

<?php $__env->startSection('content'); ?>

<div class="content container-fluid">
    <div class="page-header">
        <div>
            <h1 class="page-header-title"><?php echo e($supplier->name); ?></h1>
        </div>
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <ul class="nav nav-tabs page-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('admin.supplier.view',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('details')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.supplier.products',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('product_list')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.supplier.transaction-list',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('transaction')); ?></a>
                </li>
            </ul>

        </div>
    </div>

    <div class="row m-1">
        <div class="card col-12">
            <div class="card-header">
                <h3>
                    <?php echo e(\App\CPU\translate('supplier_details')); ?>

                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2 mt-2">
                        <img class="w-100"
                            src="<?php echo e($supplier['image_fullpath']); ?>">
                    </div>
                    <div class="col-12 col-md-5 mt-2">
                        <div>
                            <span><?php echo e(\App\CPU\translate('name')); ?>: <?php echo e($supplier->name); ?></span>
                        </div>
                        <div>
                            <span><?php echo e(\App\CPU\translate('Phone')); ?>: <?php echo e($supplier->mobile); ?></span>
                        </div>
                        <div>
                            <span><?php echo e(\App\CPU\translate('email')); ?>: <?php echo e($supplier->email); ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mt-2">
                        <div>
                            <span><?php echo e(\App\CPU\translate('state')); ?>: <?php echo e($supplier->state); ?></span>
                        </div>
                        <div>
                            <span><?php echo e(\App\CPU\translate('city')); ?>: <?php echo e($supplier->city); ?></span>
                        </div>
                        <div>
                            <span><?php echo e(\App\CPU\translate('zip_code')); ?>: <?php echo e($supplier->zip_code); ?></span>
                        </div>
                        <div>
                            <span><?php echo e(\App\CPU\translate('address')); ?>: <?php echo e($supplier->address); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/supplier/view.blade.php ENDPATH**/ ?>