<?php $__env->startSection('title',\App\CPU\translate('add_new_income')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                    <i class="tio-add-circle-outlined"></i>
                    <span><?php echo e(\App\CPU\translate('add_new_income')); ?></span>
                </h1>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.account.store-income')); ?>" method="post" >
                            <?php echo csrf_field(); ?>
                                <div class="row pl-2" >
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('account')); ?></label>
                                            <select name="account_id" class="form-control js-select2-custom">
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
                                </div>
                                <div class="row pl-2" >
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" ><?php echo e(\App\CPU\translate('amount')); ?></label>
                                            <input type="number" step="0.01" min="1" name="amount" class="form-control" placeholder="<?php echo e(\App\CPU\translate('amount')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('date')); ?> </label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content container-fluid">
        <div class="row align-items-center mb-2">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize"><i
                        class="tio-files"></i> <?php echo e(\App\CPU\translate('income_list')); ?>

                    <span class="badge badge-soft-dark ml-2"><?php echo e($incomes->total()); ?></span>
                </h1>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md-6 col-lg-5 mb-3 mb-lg-0">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('search_by_description')); ?>" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?> </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-lg-7">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="row">
                                        <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('from')); ?> </label>
                                            <input type="date" name="from" class="form-control" value="<?php echo e($from); ?>" required>
                                        </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('to')); ?> </label>
                                                <input type="date" name="to" class="form-control" value="<?php echo e($to); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button href="" class="btn btn-success mt-4"> <?php echo e(\App\CPU\translate('filter')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('date')); ?></th>
                                <th><?php echo e(\App\CPU\translate('account')); ?></th>
                                <th><?php echo e(\App\CPU\translate('type')); ?></th>
                                <th><?php echo e(\App\CPU\translate('amount')); ?></th>
                                <th><?php echo e(\App\CPU\translate('description')); ?></th>
                                <th><?php echo e(\App\CPU\translate('debit')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('credit')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('balance')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($income->date); ?></td>
                                        <td>
                                            <?php if($income->account): ?>
                                                <?php echo e($income->account->account); ?>

                                            <?php else: ?>
                                                <span class="badge badge-danger"><?php echo e(\App\CPU\translate('Account Deleted')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-info ml-sm-3">
                                                <?php echo e($income->tran_type); ?> <br>
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo e($income->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Str::limit($income->description,30)); ?>

                                        </td>
                                        <td>
                                            <?php if($income->debit): ?>
                                                <?php echo e($income->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php else: ?>
                                                 <?php echo e(0 ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($income->credit): ?>
                                                <?php echo e($income->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php else: ?>
                                                 <?php echo e(0 ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($income->balance ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="page-area">
                            <table>
                                <tfoot class="border-top">
                                    <?php echo $incomes->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($incomes)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 img-one-in" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/income/add.blade.php ENDPATH**/ ?>