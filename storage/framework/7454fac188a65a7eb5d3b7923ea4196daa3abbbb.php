<?php $__env->startSection('title',\App\CPU\translate('stock_limit_products_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3">
                <div class="col-12 mb-2 mb-sm-0">
                    <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                        <i class="tio-files"></i>
                        <span><?php echo e(\App\CPU\translate('stock_limit_products_list')); ?> <span class="badge badge-soft-dark ml-2"><?php echo e($products->total()); ?></span></span>
                    </h1>
                    <span><?php echo e(\App\CPU\translate('the_products_are_shown_in_this_list,_which_quantity_is_below')); ?> <?php echo e(\App\Models\BusinessSetting::where(['key'=>'stock_limit'])->first()->value); ?></span>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-sm-8 col-md-6">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('search_by_product_code_or_name')); ?>" aria-label="<?php echo e(\App\CPU\translate('Search')); ?>" value="<?php echo e($search); ?>"  required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-1 col-12 col-sm-4">
                                <select name="qty_order_sort" class="form-control" id="qtyOrderSortSelect">
                                    <option value="default" <?php echo e($sortOrderQty== "default"?'selected':''); ?>><?php echo e(\App\CPU\translate('default_sort')); ?></option>
                                    <option value="quantity_asc" <?php echo e($sortOrderQty== "quantity_asc"?'selected':''); ?>><?php echo e(\App\CPU\translate('quantity_sort_by_(low_to_high)')); ?></option>
                                <option value="quantity_desc" <?php echo e($sortOrderQty== "quantity_desc"?'selected':''); ?>><?php echo e(\App\CPU\translate('quantity_sort_by_(high_to_low)')); ?></option>
                                <option value="order_asc" <?php echo e($sortOrderQty== "order_asc"?'selected':''); ?>><?php echo e(\App\CPU\translate('order_sort_by_(low_to_high)')); ?></option>
                                <option value="order_desc" <?php echo e($sortOrderQty== "order_desc"?'selected':''); ?>><?php echo e(\App\CPU\translate('order_sort_by_(high_to_low)')); ?></option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('image')); ?></th>
                                <th><?php echo e(\App\CPU\translate('supplier_name/mobile')); ?></th>
                                <th><?php echo e(\App\CPU\translate('product_code')); ?></th>
                                <th><?php echo e(\App\CPU\translate('purchase_price')); ?></th>
                                <th><?php echo e(\App\CPU\translate('selling_price')); ?></th>
                                <th><?php echo e(\App\CPU\translate('quantity')); ?></th>
                                <th><?php echo e(\App\CPU\translate('orders')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($products->firstitem()+$key); ?></td>
                                    <td>
                                        <span class="d-block font-size-sm text-body">
                                            <?php echo e(substr($product['name'],0,20)); ?><?php echo e(strlen($product['name'])>20?'...':''); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <img class="img-one-sto" src="<?php echo e($product['image_fullpath']); ?>">
                                    </td>
                                    <td>
                                        <?php echo e($product->supplier?$product->supplier->name:\App\CPU\translate('not_found')); ?> <br>
                                        <?php echo e($product->supplier?$product->supplier->mobile:\App\CPU\translate('not_found')); ?>

                                    </td>
                                    <td><?php echo e($product['product_code']); ?></td>
                                    <td><?php echo e($product['purchase_price'] ." ".\App\CPU\Helpers::currency_symbol()); ?></td>
                                    <td><?php echo e($product['selling_price'] ." ".\App\CPU\Helpers::currency_symbol()); ?></td>
                                    <td><?php echo e($product['quantity']); ?>

                                        <button class="btn btn-sm update-quantity-btn" data-product-id="<?php echo e($product->id); ?>" id="<?php echo e($product->id); ?>" type="button" data-toggle="modal" data-target="#update-quantity">
                                            <i class="tio-add-circle"></i>
                                        </button>
                                    </td>
                                    <td><?php echo e($product->order_count??0); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="page-area">
                            <table>
                                <tfoot class="border-top">
                                <?php echo $products->links(); ?>

                                </tfoot>
                            </table>
                        </div>
                        <?php if(count($products)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 img-two-sto" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="update-quantity" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(\App\CPU\translate('update_product_quantity')); ?> <br>
                    <span class="text-danger">(<?php echo e(\App\CPU\translate('to_decrease_product_quantity_use_minus_before_number._Ex: -10')); ?> )</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.stock.update-quantity')); ?>" method="post" class="row">
                    <?php echo csrf_field(); ?>
                    <div class="form-group col-sm-12">
                        <label for=""><?php echo e(\App\CPU\translate('quantity')); ?></label>
                        <input type="number" class="form-control" name="quantity" required>
                        <input type="hidden" id="product_id" name="id" value="<?php echo e($product['id']??0); ?>">
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

    <script>
        "use strict";

        $('.update-quantity-btn').on('click', function() {
            var productId = $(this).data('product-id');
            update_quantity_sto(productId);
        });

        $('#qtyOrderSortSelect').on('change', function() {
            var selectedValue = $(this).val();
            var redirectUrl = '<?php echo e(url('/')); ?>/admin/stock/stock-limit/?sort_orderQty=' + selectedValue;
            window.location.href = redirectUrl;
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/stock/list.blade.php ENDPATH**/ ?>