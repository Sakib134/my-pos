<?php $__env->startSection('title',\App\CPU\translate('customer_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize"><i
                        class="tio-filter-list"></i> <?php echo e(\App\CPU\translate('customer_list')); ?>

                    <span class="badge badge-soft-dark ml-2"><?php echo e($customers->total()); ?></span>
                </h1>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-sm-7 col-md-6 col-lg-4 col-xl-6 mb-3 mb-sm-0">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('search_by_name_or_phone')); ?>" aria-label="Search" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?> </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-sm-5">
                                <a href="<?php echo e(route('admin.customer.add')); ?>" class="btn btn-primary float-right"><i
                                        class="tio-add-circle"></i> <?php echo e(\App\CPU\translate('add_new_customer')); ?>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th><?php echo e(\App\CPU\translate('image')); ?></th>
                                <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th><?php echo e(\App\CPU\translate('phone')); ?></th>
                                <th><?php echo e(\App\CPU\translate('orders')); ?></th>
                                <th class="text-center" ><?php echo e(\App\CPU\translate('balance')); ?></th>
                                <th><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                                <?php if($customers->currentPage() === 1): ?>
                                <tr>
                                    <td><?php echo e(1); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.customer.view', [$walkingCustomer['id']])); ?>">
                                            <img class="img-one-cl" src="<?php echo e($walkingCustomer['image_fullpath']); ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-primary" href="<?php echo e(route('admin.customer.view', [$walkingCustomer['id']])); ?>">
                                            <?php echo e($walkingCustomer->name); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php if($walkingCustomer->id != 0): ?>
                                            <?php echo e($walkingCustomer->mobile); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\CPU\translate('no_phone')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($walkingCustomer->orders->count()); ?></td>
                                    <td class="text-center p-5">
                                        <?php if($walkingCustomer->id != 0): ?>
                                            <div class="row">
                                                <div class="col-5">
                                                    <?php echo e($walkingCustomer->balance . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                                                </div>
                                                <div class="col-5">
                                                    <a class="btn btn-info p-1 badge update-customer-balance" id="<?php echo e($walkingCustomer->id); ?>" data-id="<?php echo e($walkingCustomer->id); ?>" type="button" data-toggle="modal" data-target="#update-customer-balance">
                                                        <i class="tio-add-circle"></i>
                                                        <?php echo e(\App\CPU\translate('add_balance')); ?>

                                                    </a>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <?php echo e(\App\CPU\translate('no_balance')); ?>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1" href="<?php echo e(route('admin.customer.view', [$walkingCustomer['id']])); ?>"><span class="tio-visible"></span></a>
                                    </td>
                                </tr>
                            <?php endif; ?>

                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($customers->firstItem() + $key+1); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.customer.view', [$customer['id']])); ?>">
                                            <img class="img-one-cl" src="<?php echo e($customer['image_fullpath']); ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-primary" href="<?php echo e(route('admin.customer.view', [$customer['id']])); ?>">
                                            <?php echo e($customer->name); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php if($customer->id != 0): ?>
                                            <?php echo e($customer->mobile); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\CPU\translate('no_phone')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($customer->orders->count()); ?></td>
                                    <td class="text-center p-5">
                                        <div class="row">
                                            <div class="col-5">
                                                <?php echo e($customer->balance . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                                            </div>
                                            <div class="col-5">
                                                <a class="btn btn-info p-1 badge update-customer-balance" id="<?php echo e($customer->id); ?>" data-id="<?php echo e($customer->id); ?>" type="button" data-toggle="modal" data-target="#update-customer-balance">
                                                    <i class="tio-add-circle"></i>
                                                    <?php echo e(\App\CPU\translate('add_balance')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1" href="<?php echo e(route('admin.customer.view', [$customer['id']])); ?>"><span class="tio-visible"></span></a>
                                        <a class="btn btn-white mr-1" href="<?php echo e(route('admin.customer.edit', [$customer['id']])); ?>">
                                            <span class="tio-edit"></span>
                                        </a>
                                        <a class="btn btn-white mr-1 form-alert" href="javascript:" data-id="customer-<?php echo e($customer['id']); ?>" data-message="<?php echo e($customer['balance'] < 0 ? \App\CPU\translate('This customer has Payable amount. Current balance is') . ' ' . $customer->balance . ' .' : ''); ?> <?php echo e(\App\CPU\translate('Do you want to delete this customer')); ?>?"><span class="tio-delete"></span></a>
                                        <form action="<?php echo e(route('admin.customer.delete', [$customer['id']])); ?>" method="post" id="customer-<?php echo e($customer['id']); ?>">
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
                                <?php echo $customers->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($customers)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-one-cl" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="update-customer-balance" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_customer_balance')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.customer.update-balance')); ?>" method="post" class="row">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="customer_id" name="customer_id">
                        <div class="form-group col-12 col-sm-6">
                            <label for=""><?php echo e(\App\CPU\translate('balance')); ?></label>
                            <input type="number" step="0.01" min="0" class="form-control" name="amount" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('balance_receive_account')); ?></label>
                                <select name="account_id" class="form-control js-select2-custom" required>
                                    <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($account['id']!=2 && $account['id']!=3): ?>
                                            <option value="<?php echo e($account['id']); ?>"><?php echo e($account['account']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('description')); ?> </label>
                                <input type="text" name="description" class="form-control" placeholder="<?php echo e(\App\CPU\translate('description')); ?>" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('date')); ?> </label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-sm btn-primary" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/customer/list.blade.php ENDPATH**/ ?>