<?php $__env->startSection('title',\App\CPU\translate('Order List')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3">
                <div class="col-sm">
                    <h1 class="page-header-title text-capitalize"><?php echo e(\App\CPU\translate('pos')); ?> <?php echo e(\App\CPU\translate('orders')); ?>

                        <span class="badge badge-soft-dark ml-2"><?php echo e($orders->total()); ?></span></h1>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-8 col-md-6 col-lg-6 mb-3 mb-lg-0">
                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input type="search" name="search" class="form-control"
                                       placeholder="<?php echo e(\App\CPU\translate('search_by_order_id')); ?>" aria-label="Search"
                                       value="<?php echo e($search); ?>" required>
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
            <div class="table-responsive ">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                    <tr>
                        <th class=""><?php echo e(\App\CPU\translate('#')); ?></th>
                        <th class="table-column-pl-0"><?php echo e(\App\CPU\translate('order')); ?></th>
                        <th><?php echo e(\App\CPU\translate('date')); ?></th>
                        <th><?php echo e(\App\CPU\translate('payment_method')); ?></th>
                        <th><?php echo e(\App\CPU\translate('order_amount')); ?></th>
                        <th><?php echo e(\App\CPU\translate('total_tax')); ?></th>
                        <th><?php echo e(\App\CPU\translate('extra_discount')); ?></th>
                        <th><?php echo e(\App\CPU\translate('coupon_discount')); ?></th>
                        <th><?php echo e(\App\CPU\translate('paid_amount')); ?></th>
                        <th><?php echo e(\App\CPU\translate('actions')); ?></th>
                    </tr>
                    </thead>

                    <tbody id="set-rows">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="status-<?php echo e($order['order_status']); ?> class-all">
                            <td class="">
                                <?php echo e($key+$orders->firstItem()); ?>

                            </td>
                            <td class="table-column-pl-0">
                                <a class="text-primary print-invoice" href="#" data-id="<?php echo e($order->id); ?>"><?php echo e($order['id']); ?></a>
                            </td>
                            <td><?php echo e(date('d M Y',strtotime($order['created_at']))); ?></td>
                            <td>
                                <?php echo e(($order->payment_id != 0) ? ($order->account ? $order->account->account : \App\CPU\translate('account_deleted')): \App\CPU\translate('Customer balance')); ?>

                            </td>
                            <td>
                                <?php echo e($order->order_amount . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                            </td>
                            <td><?php echo e($order['total_tax'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?></td>
                            <td><?php echo e($order->extra_discount?$order->extra_discount .' '.\App\CPU\Helpers::currency_symbol():0 .' '.\App\CPU\Helpers::currency_symbol()); ?></td>
                            <td><?php echo e($order->coupon_discount_amount?$order->coupon_discount_amount .' '.\App\CPU\Helpers::currency_symbol():0 .' '.\App\CPU\Helpers::currency_symbol()); ?></td>
                            <td><?php echo e($order->order_amount + $order->total_tax - $order->extra_discount - $order->coupon_discount_amount .' '.\App\CPU\Helpers::currency_symbol()); ?></td>
                            <td>
                                <button class="btn btn-sm btn-white print-invoice" target="_blank" type="button"
                                        data-id="<?php echo e($order->id); ?>"><i
                                        class="tio-download"></i> <?php echo e(\App\CPU\translate('invoice')); ?>

                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <?php echo $orders->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php if(count($orders)==0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 img-one-ol" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg"
                         alt="Image Description">
                    <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="print-invoice" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(\App\CPU\translate('print')); ?> <?php echo e(\App\CPU\translate('invoice')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-dark" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <input type="button" class="mt-2 btn btn-primary non-printable print-div"
                                   data-name="printableArea"
                                   value="<?php echo e(\App\CPU\translate('Proceed, If thermal printer is ready')); ?>."/>
                            <a href="<?php echo e(url()->previous()); ?>"
                               class="mt-2 btn btn-danger non-printable"><?php echo e(\App\CPU\translate('Back')); ?></a>
                        </div>
                        <hr class="non-printable">
                    </div>
                    <div class="row m-auto" id="printableArea">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        "use strict";
        $(".print-invoice").on('click', function(){
            let order_id = $(this).data('id');
            print_invoice(order_id);
        });

        function print_invoice(order_id) {
            $.get({
                url: '<?php echo e(url('/')); ?>/admin/pos/invoice/' + order_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#print-invoice').modal('show');
                    $('#printableArea').empty().html(data.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/pos/order/list.blade.php ENDPATH**/ ?>