<?php $__env->startSection('title',\App\CPU\translate('account_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                <i class="tio-filter-list"></i>
                <span><?php echo e(\App\CPU\translate('account_list')); ?> <span
                        class="badge badge-soft-dark ml-2"><?php echo e($accounts->total()); ?></span></span>
            </h1>
        </div
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-10 mb-1 mb-md-0 col-sm-7 col-md-6">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('search_by_account_title')); ?>"
                                               value="<?php echo e($search); ?>" required>
                                        <button type="submit"
                                                class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?> </button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-sm-5  col-md-4">
                                <a href="<?php echo e(route('admin.account.add')); ?>" class="btn btn-primary float-right"><i
                                        class="tio-add-circle"></i> <?php echo e(\App\CPU\translate('add_new_account')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th><?php echo e(\App\CPU\translate('account_info')); ?></th>
                                <th><?php echo e(\App\CPU\translate('balance_info')); ?></th>
                                <th class="w-fp-acc"><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($accounts->firstItem()+$key); ?></td>
                                    <td>
                                        <div class="max-w450 text-wrap">
                                            <?php echo e($account->account); ?> <br>

                                            <?php if($account->id !=1 && $account->id !=2 && $account->id !=3): ?>
                                                <?php echo e($account->account_number); ?> <br>
                                                <?php echo e($account->description); ?>

                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <td>
                                        <?php echo e(\App\CPU\translate('balance')); ?>

                                        : <?php echo e($account->balance . ' ' . \App\CPU\Helpers::currency_symbol()); ?> <br>
                                        <?php echo e(\App\CPU\translate('total_in')); ?>

                                        : <?php echo e($account->total_in ? $account->total_in . ' ' . \App\CPU\Helpers::currency_symbol() : 0   . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                                        <br>
                                        <?php echo e(\App\CPU\translate('total_out')); ?>

                                        : <?php echo e($account->total_out ? $account->total_out . ' ' . \App\CPU\Helpers::currency_symbol() : 0 . ' ' . \App\CPU\Helpers::currency_symbol()); ?> <br>
                                    </td>
                                    <td>
                                        <?php if($account->id !=1 && $account->id !=2 && $account->id !=3): ?>
                                            <a class="btn btn-white mr-1"
                                               href="<?php echo e(route('admin.account.edit',[$account['id']])); ?>">
                                                <span class="tio-edit"></span>
                                            </a>
                                            <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                               data-id="account-<?php echo e($account['id']); ?>"
                                               data-message="<?php echo e(\App\CPU\translate('Want to delete this account')); ?>?">
                                                <span class="tio-delete"></span></a>
                                            <form action="<?php echo e(route('admin.account.delete',[$account['id']])); ?>"
                                                  method="post" id="account-<?php echo e($account['id']); ?>">
                                                <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            </form>
                                        <?php else: ?>
                                            <span><?php echo e(\App\CPU\translate('default')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="page-area">
                            <table>
                                <tfoot class="border-top">
                                <?php echo $accounts->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($accounts)==0): ?>
                            <?php echo $__env->make('layouts.admin.partials._no-data-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/account/list.blade.php ENDPATH**/ ?>