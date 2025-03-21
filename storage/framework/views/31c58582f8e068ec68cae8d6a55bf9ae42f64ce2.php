<?php $__env->startSection('title',\App\CPU\translate('supplier_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize"><i
                        class="tio-filter-list"></i> <?php echo e(\App\CPU\translate('supplier_list')); ?>

                    <span class="badge badge-soft-dark ml-2"><?php echo e($suppliers->total()); ?></span>
                </h1>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md-6 mb-3">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('search_by_name_or_phone')); ?>" aria-label="<?php echo e(\App\CPU\translate('Search')); ?>" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?> </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-6">
                                <a href="<?php echo e(route('admin.supplier.add')); ?>" class="btn btn-primary float-right"><i
                                        class="tio-add-circle"></i> <?php echo e(\App\CPU\translate('add_new_supplier')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th class="hide-div-sl"><?php echo e(\App\CPU\translate('email')); ?></th>
                                <th class="hide-div-sl"> <?php echo e(\App\CPU\translate('phone')); ?></th>
                                <th><?php echo e(\App\CPU\translate('products')); ?></th>
                                <th><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($suppliers->firstItem()+$key); ?></td>
                                    <td>
                                        <a class="text-primary" href="<?php echo e(route('admin.supplier.view',[$supplier['id']])); ?>">
                                            <?php echo e($supplier->name); ?>

                                        </a>
                                    </td>
                                    <td class="hide-div-sl">
                                        <a class="text-dark" href="mailto:<?php echo e($supplier['email']); ?>" class="text-primary"><?php echo e($supplier['email']); ?></a>
                                    </td>
                                    <td class="hide-div-sl">
                                        <a href="tel:<?php echo e($supplier->mobile); ?>"><?php echo e($supplier->mobile); ?></a>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" class="badge badge-soft-info" href="<?php echo e(route('admin.supplier.products',[$supplier['id']])); ?>"
                                            title="<?php echo e(\App\CPU\translate('product_view')); ?>">
                                            <?php echo e($supplier->products->count()); ?>

                                        </a>
                                        <div class="tooltip bs-tooltip-top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="tooltip-inner"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1" href="<?php echo e(route('admin.supplier.view',[$supplier['id']])); ?>"><span class="tio-visible"></span></a>
                                        <a class="btn btn-white mr-1"
                                            href="<?php echo e(route('admin.supplier.edit',[$supplier['id']])); ?>">
                                            <span class="tio-edit"></span>
                                        </a>
                                        <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                           data-id="supplier-<?php echo e($supplier['id']); ?>"
                                           data-message="<?php echo e(\App\CPU\translate('Want to delete this supplier')); ?>?"><span class="tio-delete"></span></a>
                                            <form action="<?php echo e(route('admin.supplier.delete',[$supplier['id']])); ?>"
                                                    method="post" id="supplier-<?php echo e($supplier['id']); ?>">
                                                <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="page-area">
                            <table>
                                <tfoot class="border-top">
                                <?php echo $suppliers->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($suppliers)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 img-one-sl" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/supplier/list.blade.php ENDPATH**/ ?>