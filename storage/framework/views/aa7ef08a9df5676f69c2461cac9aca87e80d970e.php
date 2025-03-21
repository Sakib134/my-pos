<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css" />
<?php $__env->stopPush(); ?>
<div class="card-body pt-0">
    <div class="table-responsive pos-cart-table border">
        <table class="table table-align-middle mb-0">
            <thead class="text-muted">
            <tr>
                <th><?php echo e(\App\CPU\translate('item')); ?></th>
                <th><?php echo e(\App\CPU\translate('qty')); ?></th>
                <th><?php echo e(\App\CPU\translate('price')); ?></th>
                <th><?php echo e(\App\CPU\translate('delete')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $subtotal = 0;
            $tax = 0;
            $ext_discount = 0;
            $ext_discount_type = 'amount';
            $discount_on_product = 0;
            $product_tax = 0;
            $coupon_discount = 0;
            ?>

            <?php if(session()->has($cartId) && count(session($cartId)) > 0): ?>
                    <?php
                    $cart = session()->get($cartId);
                    if (isset($cart['tax'])) {
                        $tax = $cart['tax'];
                    }
                    if (isset($cart['ext_discount'])) {
                        $ext_discount = $cart['ext_discount'];
                        $ext_discount_type = $cart['ext_discount_type'];
                    }
                    if (isset($cart['coupon_discount'])) {
                        $coupon_discount = $cart['coupon_discount'];
                    }
                    ?>
                <?php $__currentLoopData = session($cartId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($cartItem)): ?>
                            <?php
                            $product_subtotal = $cartItem['price'] * $cartItem['quantity'];
                            $discount_on_product += $cartItem['discount'] * $cartItem['quantity'];
                            $subtotal += $product_subtotal;
                            $product_tax += $cartItem['tax'] * $cartItem['quantity'];

                            ?>
                        <tr>
                            <td class="media gap-2 align-items-center">
                                <img class="avatar avatar-sm"
                                     src="<?php echo e(onErrorImage($cartItem['image'],asset('storage/app/public/product').'/' . $cartItem['image'],asset('public/assets/admin/img/160x160/img2.jpg') ,'product/')); ?>"
                                     alt="<?php echo e($cartItem['name']); ?> <?php echo e(\App\CPU\translate('image')); ?>">
                                <div class="media-body">
                                    <h5 class="text-hover-primary mb-0"><?php echo e(Str::limit($cartItem['name'], 50)); ?></h5>
                                </div>
                            </td>
                            <td>
                                <input type="number" data-key="<?php echo e($key); ?>" class="form-control text-center qty-width"
                                       value="<?php echo e($cartItem['quantity']); ?>" min="1"
                                       onkeyup="updateQuantity('<?php echo e($cartItem['id']); ?>',this.value)">
                            </td>
                            <td>
                                <div>
                                    <?php echo e($product_subtotal . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                                </div>
                            </td>
                            <td>
                                <a href="javascript:removeFromCart(<?php echo e($cartItem['id']); ?>)"
                                   class="btn btn-sm btn-outline-danger square-btn"> <i class="tio-delete"></i></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    $total = $subtotal - $discount_on_product;
    $discount_amount = $ext_discount_type == 'percent' && $ext_discount > 0 ? ($subtotal * $ext_discount) / 100 : $ext_discount;
    $total -= $discount_amount;
    $total_tax_amount = $product_tax;
?>
<div class="box p-3">
    <dl class="row">
        <dt class="col-6"><?php echo e(\App\CPU\translate('sub_total')); ?> :</dt>
        <dd class="col-6 text-right"><?php echo e($subtotal . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>

        <dt class="col-6"><?php echo e(\App\CPU\translate('product_discount')); ?> :</dt>
        <dd class="col-6 text-right"><?php echo e(round($discount_on_product, 2) . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

        </dd>

        <dt class="col-6"><?php echo e(\App\CPU\translate('extra_discount')); ?> :</dt>
        <dd class="col-6 text-right">
            <button id="extra_discount" class="btn btn-sm" type="button" data-toggle="modal"
                    data-target="#add-discount"><i
                    class="tio-edit"></i></button><?php echo e(number_format($discount_amount, 2)); ?> <?php echo e(\App\CPU\Helpers::currency_symbol()); ?>

        </dd>
        <dt class="col-6"><?php echo e(\App\CPU\translate('coupon_discount')); ?> :</dt>
        <dd class="col-6 text-right">
            <button id="coupon_discount" class="btn btn-sm" type="button" data-toggle="modal"
                    data-target="#add-coupon-discount"><i
                    class="tio-edit"></i></button><?php echo e($coupon_discount . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

        </dd>

        <dt class="col-6"><?php echo e(\App\CPU\translate('tax')); ?> :</dt>
        <dd class="col-6 text-right"><?php echo e(round($total_tax_amount, 2) . ' ' . \App\CPU\Helpers::currency_symbol()); ?></dd>
        <dt class="col-6"><?php echo e(\App\CPU\translate('total')); ?> :</dt>
        <dd class="col-6 text-right h4 b">
            <span id="total_price"><?php echo e(round($total + $total_tax_amount - $coupon_discount, 2)); ?></span>
            <?php echo e(\App\CPU\Helpers::currency_symbol()); ?>

        </dd>
    </dl>
    <div class="row g-2">
        <div class="col-6 mt-2">
            <button type="button" class="btn btn-danger btn-block empty-cart">
                <i class="fa fa-times-circle "></i>
                <?php echo e(\App\CPU\translate('Cancel_Order')); ?>

            </button>
        </div>
        <div class="col-6 mt-2">
            <button type="button" class="btn btn-success btn-block submit-order">
                <i class="fa fa-shopping-bag"></i>
                <?php echo e(\App\CPU\translate('Place_Order')); ?>

            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="add-customer" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('add_new_customer')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.customer.store')); ?>" method="post" id="product_form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="balance" value=0>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('customer_name')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('customer_name')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('mobile_no')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="tel" id="mobile" name="mobile" class="form-control"
                                       value="<?php echo e(old('mobile')); ?>"
                                       pattern="[+0-9]+"
                                       title="Please enter a valid phone number with only numbers and the plus sign (+)"
                                       placeholder="<?php echo e(\App\CPU\translate('mobile_no')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('email')); ?></label>
                                <input type="email" name="email" class="form-control"
                                       value="<?php echo e(old('email')); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('Ex_:_ex@example.com')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('state')); ?></label>
                                <input type="text" name="state" class="form-control"
                                       value="<?php echo e(old('state')); ?>" placeholder="<?php echo e(\App\CPU\translate('state')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('city')); ?> </label>
                                <input type="text" name="city" class="form-control"
                                       value="<?php echo e(old('city')); ?>" placeholder="<?php echo e(\App\CPU\translate('city')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('zip_code')); ?> </label>
                                <input type="text" name="zip_code" class="form-control"
                                       value="<?php echo e(old('zip_code')); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('zip_code')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(\App\CPU\translate('address')); ?> </label>
                                <input type="text" name="address" class="form-control"
                                       value="<?php echo e(old('address')); ?>"
                                       placeholder="<?php echo e(\App\CPU\translate('address')); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" id="submit_new_customer"
                                class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-discount" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('extra_discount')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for=""><?php echo e(\App\CPU\translate('discount')); ?></label>
                        <input type="number" id="dis_amount" class="form-control" name="discount" step="0.01" min="0">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for=""><?php echo e(\App\CPU\translate('type')); ?></label>
                        <select name="type" id="type_ext_dis" class="form-control type_ext_dis">
                            <option value="amount" <?php echo e($ext_discount_type == 'amount' ? 'selected' : ''); ?>>
                                <?php echo e(\App\CPU\translate('amount')); ?>

                                (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)
                            </option>
                            <option value="percent" <?php echo e($ext_discount_type == 'percent' ? 'selected' : ''); ?>>
                                <?php echo e(\App\CPU\translate('percent')); ?>

                                (%)
                            </option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary extra-discount"
                            type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-coupon-discount" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('coupon_discount')); ?></h5>
                <button id="coupon_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for=""><?php echo e(\App\CPU\translate('coupon_code')); ?></label>
                    <input type="text" id="coupon_code" class="form-control" name="coupon_code">
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary coupon-discount" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-tax" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_tax')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.pos.tax')); ?>" method="POST" class="row">
                    <?php echo csrf_field(); ?>
                    <div class="form-group col-12">
                        <label for=""><?php echo e(\App\CPU\translate('tax')); ?> (%)</label>
                        <input type="number" class="form-control" name="tax" min="0">
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-sm btn-primary"
                                type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('payment')); ?> </h5>
                <button id="payment_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="style-three-cart"><?php echo e(\App\CPU\translate('total')); ?></span>
                <h4 class="mb-0" id="total_balance"><span class="style-four-cart"> = </span>
                    <?php echo e(round($total + $total_tax_amount - $coupon_discount, 2)); ?>

                    <?php echo e(\App\CPU\Helpers::currency_symbol()); ?></h4>
            </div>
            <?php
                $accounts = \App\Models\Account::orderBy('id')->get();
            ?>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.pos.order')); ?>" id='order_place' method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('type')); ?></label>
                        <select class="payment-opp form-control" name="type" id="payment_opp"
                                class="form-control select2" required>
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($account['id'] != 2 && $account['id'] != 3): ?>
                                    <option value="<?php echo e($account['id']); ?>"><?php echo e($account['account']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group d-none" id="balance">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('customer_balance')); ?>

                            (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)</label>
                        <input type="number" id="balance_customer" class="form-control" name="customer_balance"
                               disabled>
                    </div>
                    <div class="form-group d-none" id="remaining_balance">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('remaining_balance')); ?>

                            (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)</label>
                        <input type="number" id="balance_remain" class="form-control" name="remaining_balance"
                               value="" readonly>
                    </div>
                    <div class="form-group d-none" id="transaction_ref">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('transaction_reference')); ?>

                            (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)
                            -(<?php echo e(\App\CPU\translate('optional')); ?>)</label>
                        <input type="text" id="tran_ref" class="form-control" name="transaction_reference">
                    </div>
                    <div class="form-group" id="collected_cash">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('collected_cash')); ?>

                            (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)</label>
                        <input type="number" id="cash_amount" onkeyup="price_calculation();" class="form-control"
                               name="collected_cash" step="0.01">
                    </div>
                    <div class="form-group" id="returned_amount">
                        <label class="input-label" for=""><?php echo e(\App\CPU\translate('returned_amount')); ?>

                            (<?php echo e(\App\CPU\Helpers::currency_symbol()); ?>)</label>
                        <input type="number" id="returned" class="form-control" name="returned_amount"
                               value="" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary" id="order_complete"
                                type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="short-cut-keys" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('short_cut_keys')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span><?php echo e(\App\CPU\translate('to_click_order')); ?> : alt + O</span><br>
                <span><?php echo e(\App\CPU\translate('to_click_payment_submit')); ?> : alt + S</span><br>
                <span><?php echo e(\App\CPU\translate('to_close_payment_submit')); ?> : alt + Z</span><br>
                <span><?php echo e(\App\CPU\translate('to_click_cancel_cart_item_all')); ?> : alt + C</span><br>
                <span><?php echo e(\App\CPU\translate('to_click_add_new_customer')); ?> : alt + A</span> <br>
                <span><?php echo e(\App\CPU\translate('to_submit_add_new_customer_form')); ?> : alt + N</span><br>
                <span><?php echo e(\App\CPU\translate('to_click_short_cut_keys')); ?> : alt + K</span><br>
                <span><?php echo e(\App\CPU\translate('to_print_invoice')); ?> : alt + P</span> <br>
                <span><?php echo e(\App\CPU\translate('to_cancel_invoice')); ?> : alt + B</span> <br>
                <span><?php echo e(\App\CPU\translate('to_focus_search_input')); ?> : alt + Q</span> <br>
                <span><?php echo e(\App\CPU\translate('to_click_extra_discount')); ?> : alt + E</span> <br>
                <span><?php echo e(\App\CPU\translate('to_click_coupon_discount')); ?> : alt + D</span> <br>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    $(".empty-cart").on('click', function(){
        emptyCart();
    });

    $(".submit-order").on('click', function(){
        submit_order();
    });

    $(".coupon-discount").on('click', function(){
        coupon_discount();
    });

    $(".extra-discount").on('click', function(){
        extra_discount();
    });

    $('.type_ext_dis').on('change', function() {
        limit(this);
    });

    $('.payment-opp').on('change', function() {
        payment_option(this);
    });
</script>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/pos/_cart.blade.php ENDPATH**/ ?>