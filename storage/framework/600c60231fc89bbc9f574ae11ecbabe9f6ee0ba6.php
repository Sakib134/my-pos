<?php $__env->startSection('title',\App\CPU\translate('add_new_coupon')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize mb-3">
                <i class="tio-add-circle-outlined"></i>
                <span><?php echo e(\App\CPU\translate('add_new_coupon')); ?></span>
            </h1>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.coupon.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('title')); ?></label>
                                        <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" placeholder="<?php echo e(\App\CPU\translate('new_coupon')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('coupon_code')); ?></label>
                                            <a href="javascript:void(0)" class="float-right c1 fz-12 generate-code-link"><?php echo e(\App\CPU\translate('generate_code')); ?></a>
                                        </div>
                                        <input type="text" name="code" class="form-control" value="" id="code"
                                            placeholder="<?php echo e(\Illuminate\Support\Str::random(8)); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('coupon_type')); ?> </label>
                                        <select name="coupon_type" class="form-control coupon-type-change">
                                            <option value="default"><?php echo e(\App\CPU\translate('default')); ?></option>
                                            <option value="first_order"><?php echo e(\App\CPU\translate('first_order')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6" id="limit-for-user">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('limit_for_same_user')); ?> </label>
                                        <input min="1" type="number" name="user_limit" value="<?php echo e(old('user_limit')); ?>" class="form-control" placeholder="<?php echo e(\App\CPU\translate('EX:_10')); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('start_date')); ?> </label>
                                        <input id="start_date" type="date" name="start_date" class="form-control checkstartDate" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('expire_date')); ?> </label>
                                        <input id="expire_date" type="date" name="expire_date" class="form-control check-date" required>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('min_purchase')); ?> </label>
                                            <input type="number" step="0.01" name="min_purchase" value="0" min="0" max="1000000" class="form-control"
                                                placeholder="<?php echo e(\App\CPU\translate('100')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6" id="max_discount">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('max_discount')); ?></label>
                                            <input type="number" step="0.01" min="0" value="0" max="1000000" name="max_discount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('discount')); ?></label>
                                            <input type="number" step="0.01" min="1" max="1000000" name="discount" value="<?php echo e(old('discount')); ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('discount')); ?> <?php echo e(\App\CPU\translate('type')); ?></label>
                                            <select  name="discount_type" class="form-control discount-amount">
                                                <option value="percent"><?php echo e(\App\CPU\translate('percent')); ?></option>
                                                <option value="amount"><?php echo e(\App\CPU\translate('amount')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                            </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="w-100">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-6">
                                    <h5 class="card-header-title">
                                        <span><?php echo e(\App\CPU\translate('coupon_table')); ?></span>
                                        <span class="badge badge-soft-dark ml-2"><?php echo e($coupons->total()); ?></span>
                                    </h5>

                                </div>
                                <div class="col-12 col-sm-8 col-md-6 mt-1 mt-sm-0">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                                   placeholder="<?php echo e(\App\CPU\translate('search_by_code_or_title')); ?>" aria-label="Search" value="<?php echo e($search); ?>" required>
                                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('title')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('code')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('min')); ?> <?php echo e(\App\CPU\translate('purchase')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('max')); ?> <?php echo e(\App\CPU\translate('discount')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('discount')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('discount')); ?> <?php echo e(\App\CPU\translate('type')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('start')); ?> <?php echo e(\App\CPU\translate('date')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('expire')); ?> <?php echo e(\App\CPU\translate('date')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($coupons->firstitem()+$key); ?></td>
                                    <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e($coupon['title']); ?>

                                    </span>
                                    </td>
                                    <td><?php echo e($coupon['code']); ?></td>
                                    <td><?php echo e($coupon['min_purchase']." ".\App\CPU\Helpers::currency_symbol()); ?></td>
                                    <td><?php echo e($coupon['discount_type'] == 'percent' ? $coupon['max_discount']." ".\App\CPU\Helpers::currency_symbol() : '-'); ?></td>
                                    <td><?php echo e($coupon['discount_type'] == 'amount' ? $coupon['discount']." ".\App\CPU\Helpers::currency_symbol() : $coupon['discount']."%"); ?></td>
                                    <td><?php echo e($coupon['discount_type']); ?></td>
                                    <td><?php echo e($coupon['start_date']); ?></td>
                                    <td><?php echo e($coupon['expire_date']); ?></td>
                                    <td>
                                        <label class="toggle-switch toggle-switch-sm">
                                            <input type="checkbox" class="toggle-switch-input change-status"
                                                data-route="<?php echo e(route('admin.coupon.status',[$coupon['id'],$coupon->status?0:1])); ?>"
                                                   class="toggle-switch-input" <?php echo e($coupon->status?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1"
                                                   href="<?php echo e(route('admin.coupon.edit',[$coupon['id']])); ?>"><span class="tio-edit"></span></a>
                                        <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                           data-id="coupon-<?php echo e($coupon['id']); ?>"
                                           data-message="<?php echo e(\App\CPU\translate('Want to delete this coupon')); ?>?"><span class="tio-delete"></span>
                                        </a>
                                        <form action="<?php echo e(route('admin.coupon.delete',[$coupon['id']])); ?>"
                                                method="post" id="coupon-<?php echo e($coupon['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <table>
                            <tfoot>
                            <?php echo $coupons->links(); ?>

                            </tfoot>
                        </table>
                         <?php if(count($coupons)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-one-carsi" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset("public/assets/admin/js/coupon-index.js")); ?>></script>

    <script>
        "use strict";

        $('.generate-code-link').on('click', function() {
            generateCode();
        });

        function  generateCode(){
            let code = Math.random().toString(36).substring(2,12);
            $('#code').val(code)
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/coupon/index.blade.php ENDPATH**/ ?>