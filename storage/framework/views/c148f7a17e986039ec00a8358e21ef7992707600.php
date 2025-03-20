<div class="width-inone">
    <div class="text-center mb-3">
        <h2 class="line-inone">
            <?php echo e(\App\Models\BusinessSetting::where(['key' => 'shop_name'])->first()->value); ?>

        </h2>
        <h5 class="style-inone">
            <?php echo e(\App\Models\BusinessSetting::where(['key' => 'shop_address'])->first()->value); ?>

        </h5>
        <h5 class="style-intwo">
            <?php echo e(\App\CPU\translate('Phone')); ?>

            : <?php echo e(\App\Models\BusinessSetting::where(['key' => 'shop_phone'])->first()->value); ?>

        </h5>
        <h5 class="style-intwo">
            <?php echo e(\App\CPU\translate('Email')); ?>

            : <?php echo e(\App\Models\BusinessSetting::where(['key' => 'shop_email'])->first()->value); ?>

        </h5>
        <h5 class="style-intwo">
            <?php echo e(\App\CPU\translate('Vat_registration_number')); ?>

            : <?php echo e(\App\Models\BusinessSetting::where(['key' => 'vat_reg_no'])->first()->value); ?>

        </h5>
    </div>

    <hr class="line-dot">

    <div class="mt-3 text-center">
        <h5><?php echo e(\App\CPU\translate('order_ID')); ?> : <?php echo e($order['id']); ?></h5>

        <h5 class="font-inone fz-10">
            <?php echo e(date('d/M/Y h:i a', strtotime($order['created_at']))); ?>

        </h5>
    </div>
    <h5 class="text-uppercase"></h5>
    <hr class="line-dot">

    <table class="table mt-3">
        <thead>
            <tr>
                <th><?php echo e(\App\CPU\translate('SL')); ?></th>
                <th><?php echo e(\App\CPU\translate('DESC')); ?></th>
                <th><?php echo e(\App\CPU\translate('QTY')); ?></th>
                <th><?php echo e(\App\CPU\translate('Price')); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php ($sub_total = 0); ?>
            <?php ($total_tax = 0); ?>
            <?php ($total_dis_on_pro = 0); ?>
            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($detail->product_details): ?>
                    <?php ($product = json_decode($detail->product_details, true)); ?>
                    <tr>
                        <td>
                            <?php echo e($key + 1); ?>

                        </td>
                        <td>
                            <span class="style-inthree"><?php echo e($product['name']); ?></span><br />
                            <?php echo e(\App\CPU\translate('price')); ?> :
                            <?php echo e($detail['price'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?> <br>
                            <?php echo e(\App\CPU\translate('discount')); ?> :
                            <?php echo e($detail['discount_on_product'] * $detail['quantity'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                        </td>
                        <td class="">
                            <?php echo e($detail['quantity']); ?>

                        </td>
                        <td>
                            <?php ($amount = ($detail['price'] - $detail['discount_on_product']) * $detail['quantity']); ?>
                            <?php echo e($amount . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                        </td>
                    </tr>
                    <?php ($sub_total += $amount); ?>
                    <?php ($total_tax += $detail['tax_amount'] * $detail['quantity']); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <hr class="line-dot">
    <dl class="row text-black-50">
        <dt class="col-7"><?php echo e(\App\CPU\translate('items_price')); ?>:</dt>
        <dd class="col-5 text-right"><?php echo e($sub_total . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-7"><?php echo e(\App\CPU\translate('Tax_/_VAT')); ?>:</dt>
        <dd class="col-5 text-right"><?php echo e($total_tax . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-7"><?php echo e(\App\CPU\translate('subtotal')); ?>:</dt>
        <dd class="col-5 text-right"><?php echo e($sub_total + $total_tax . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-7"><?php echo e(\App\CPU\translate('extra_discount')); ?>:</dt>
        <dd class="col-5 text-right">
            <?php echo e($order['extra_discount'] ? number_format($order['extra_discount'], 2) . ' ' . \App\CPU\Helpers::currency_symbol() : 0 . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-7"><?php echo e(\App\CPU\translate('coupon_discount')); ?>:</dt>
        <dd class="col-5 text-right">
            <?php echo e($order['coupon_discount_amount'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-7 total"><?php echo e(\App\CPU\translate('total')); ?>:</dt>
        <dd class="col-5 text-right total">
            <?php echo e($sub_total + $total_tax  - ($order['coupon_discount_amount'] + $order['extra_discount'])); ?> <?php echo e(\App\CPU\Helpers::currency_symbol()); ?>

        </dd>
    </dl>

    <div class="d-flex flex-wrap justify-content-between border-top pt-3">
        <div class="mr-1">
            <?php echo e(\App\CPU\translate('Paid_by')); ?>: <?php echo e(($order->payment_id != 0) ? ($order->account ? $order->account->account : \App\CPU\translate('account_deleted')): 'Customer balance'); ?>

        </div>
        <?php if($order->payment_id == 1): ?>
            <div class="mr-1"><?php echo e(\App\CPU\translate('amount')); ?>:
                <?php echo e($order->collected_cash ? $order->collected_cash . ' ' . \App\CPU\Helpers::currency_symbol() : 0 . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

            </div>
            <div class="mr-1"><?php echo e(\App\CPU\translate('change')); ?>: <?php echo e(number_format($order->collected_cash - $order->order_amount - $order->total_tax + $order->extra_discount + $order->coupon_discount_amount, 2)); ?>

                <?php echo e(\App\CPU\Helpers::currency_symbol()); ?>

            </div>
        <?php endif; ?>
    </div>
    <hr class="line-dot">
    <h5 class="text-center">
        """<?php echo e(\App\CPU\translate('THANK YOU')); ?>"""
    </h5>
    <hr class="line-dot">
</div>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/pos/order/invoice.blade.php ENDPATH**/ ?>