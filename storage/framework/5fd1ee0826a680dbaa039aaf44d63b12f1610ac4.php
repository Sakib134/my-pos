<?php $__env->startSection('title',\App\CPU\translate('transection_list')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize"><i
                        class="tio-files"></i> <?php echo e(\App\CPU\translate('transection_list')); ?>

                    <span class="badge badge-soft-dark ml-2"><?php echo e($transections->total()); ?></span>
                </h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                        <div class="row m-1">
                            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('account')); ?> </label>
                                <select id="account_id" name="account_id" class="form-control js-select2-custom">
                                    <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($account['id']); ?>" <?php echo e($accId==$account['id']?'selected':''); ?>><?php echo e($account['account']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('type')); ?> </label>
                                <select id="tran_type" name="tran_type" class="form-control js-select2-custom">
                                    <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                    <option value="Expense" <?php echo e($tranType=='Expense'?'selected':''); ?>><?php echo e(\App\CPU\translate('expense')); ?></option>
                                    <option value="Transfer" <?php echo e($tranType=='Transfer'?'selected':''); ?>><?php echo e(\App\CPU\translate('transfer')); ?></option>
                                    <option value="Income" <?php echo e($tranType=='Income'?'selected':''); ?>><?php echo e(\App\CPU\translate('income')); ?></option>
                                    <option value="Payable" <?php echo e($tranType=='Payable'?'selected':''); ?>><?php echo e(\App\CPU\translate('payable')); ?></option>
                                    <option value="Receivable" <?php echo e($tranType=='Receivable'?'selected':''); ?>><?php echo e(\App\CPU\translate('receivable')); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('start_date')); ?> </label>
                                <input id="start_date" type="date" name="from" class="form-control" value="<?php echo e($from); ?>">
                            </div>
                            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('expire_date')); ?> </label>
                                <input id="end_date" type="date" name="to" class="form-control" value="<?php echo e($to); ?>">
                            </div>

                            <?php if($accId!=null || $tranType!=null || $from!=null || $to!=null): ?>
                                <?php
                                    $chk = 1;
                                ?>
                            <?php else: ?>
                            <?php
                                    $chk = 0;
                                ?>
                            <?php endif; ?>

                            <div class="col-12 ">
                                <div class="row d-flex justify-content-center ">
                                    <button class="btn btn-success col-3 mr-1"><?php echo e(\App\CPU\translate('filter')); ?></button>
                                    <a href="<?php echo e(route('admin.account.list-transection')); ?>" class="btn btn-danger col-3 mr-1"><?php echo e(\App\CPU\translate('reset')); ?></a>
                                    <a href="<?php echo e(route('admin.account.transection-export',['account_id'=>$accId,'tran_type'=>$tranType,'from'=>$from,'to'=>$to])); ?>" class="btn btn-info col-3" data-toggle="tooltip" data-placement="top" title="<?php echo e($chk==0?\App\CPU\translate('export__data'):''); ?>"><?php echo e(\App\CPU\translate('export')); ?></a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('date')); ?></th>
                                <th><?php echo e(\App\CPU\translate('account')); ?></th>
                                <th><?php echo e(\App\CPU\translate('type')); ?></th>
                                <th><?php echo e(\App\CPU\translate('amount')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('description')); ?></th>
                                <th><?php echo e(\App\CPU\translate('debit')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('credit')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('balance')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $transections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$transection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($transection->date); ?></td>
                                        <td>
                                            <?php if($transection->account): ?>
                                                <?php echo e($transection->account->account); ?>

                                            <?php else: ?>
                                                <span class="badge badge-danger"><?php echo e(\App\CPU\translate('Account Deleted')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transection->tran_type == 'Expense'): ?>
                                                <span class="badge badge-danger">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php elseif($transection->tran_type == 'Deposit'): ?>
                                                <span class="badge badge-info">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php elseif($transection->tran_type == 'Transfer'): ?>
                                                <span class="badge badge-warning">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php elseif($transection->tran_type == 'Income'): ?>
                                                <span class="badge badge-success">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php elseif($transection->tran_type == 'Payable'): ?>
                                                <span class="badge badge-soft-warning">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php elseif($transection->tran_type == 'Receivable'): ?>
                                                <span class="badge badge-soft-success">
                                                    <?php echo e($transection->tran_type); ?> <br>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($transection->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Str::limit($transection->description,30)); ?>

                                        </td>
                                        <td>
                                            <?php if($transection->debit): ?>
                                                <?php echo e($transection->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php else: ?>
                                                 <?php echo e(0 ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transection->credit): ?>
                                                <?php echo e($transection->amount ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php else: ?>
                                                 <?php echo e(0 ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($transection->balance ." ".\App\CPU\Helpers::currency_symbol()); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="page-area">
                            <table>
                                <tfoot class="border-top">
                                <?php echo $transections->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($transections)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 img-one-tranl" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('image_description')); ?>">
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
    <script src=<?php echo e(asset("public/assets/admin/js/transaction.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/transection/list.blade.php ENDPATH**/ ?>