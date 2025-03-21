<?php $__env->startSection('title',\App\CPU\translate('supplier_product_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="page-header">
        <div>
            <h1 class="page-header-title"><?php echo e($supplier->name); ?></h1>
        </div>
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <ul class="nav nav-tabs page-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.supplier.view',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('details')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('admin.supplier.products',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('product_list')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.supplier.transaction-list',[$supplier['id']])); ?>"><?php echo e(\App\CPU\translate('transaction')); ?></a>
                </li>
            </ul>

        </div>
    </div>

        <div class="row align-items-center mt-3 mb-3">
            <div class="col-sm  mb-sm-0">
                <h1 class="page-header-title"><i
                        class="tio-filter-list"></i> <?php echo e(\App\CPU\translate('products_list')); ?>

                    <span class="badge badge-soft-dark ml-2"><?php echo e($products->total()); ?></span>
                </h1>
            </div>
            <?php if(\App\CPU\Helpers::module_permission_check('product_section')): ?>
                <div class="col-md-4">
                    <a href="<?php echo e(route('admin.product.add')); ?>" class="btn btn-primary float-right">
                        <i class="tio-add-circle-outlined"></i>  <?php echo e(\App\CPU\translate('product')); ?>

                    </a>
                </div>
            <?php endif; ?>
        </div>

    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-md-5  mb-lg-0 mt-2">
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('search_by_product_code_or_name')); ?>" aria-label="<?php echo e(\App\CPU\translate('Search')); ?>" value="<?php echo e($search); ?>" required>
                                    <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 mt-2">
                            <select name="qty_order_sort" class="form-control" id="sortOrderQtySelect">
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
                            <th><?php echo e(\App\CPU\translate('image')); ?></th>
                            <th ><?php echo e(\App\CPU\translate('name')); ?></th>
                            <th><?php echo e(\App\CPU\translate('product_code')); ?></th>
                            <th><?php echo e(\App\CPU\translate('quantity')); ?></th>
                            <th><?php echo e(\App\CPU\translate('purchase_price')); ?></th>
                            <th><?php echo e(\App\CPU\translate('selling_price')); ?></th>
                            <th><?php echo e(\App\CPU\translate('orders')); ?></th>
                            <th><?php echo e(\App\CPU\translate('action')); ?></th>
                        </tr>
                        </thead>

                        <tbody id="set-rows">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($products->firstitem()+$key); ?></td>
                                <td>
                                    <img src="<?php echo e($product['image_fullpath']); ?>" class="img-one-spl">
                                </td>
                                <td>
                                    <span class="d-block font-size-sm text-body">
                                            <a href="#">
                                            <?php echo e(substr($product['name'],0,20)); ?><?php echo e(strlen($product['name'])>20?'...':''); ?>

                                            </a>
                                    </span>
                                </td>
                                <td><?php echo e($product['product_code']); ?></td>
                                <td>
                                    <?php echo e($product['quantity']); ?>

                                    <button class="btn btn-sm update-quantity-btn" id="<?php echo e($product->id); ?>" data-product-id="<?php echo e($product->id); ?>" type="button" data-toggle="modal" data-target="#update-quantity">
                                        <i class="tio-add-circle"></i>
                                    </button>
                                </td>
                                <td><?php echo e($product['purchase_price'] ." ".\App\CPU\Helpers::currency_symbol()); ?></td>
                                <td><?php echo e($product['selling_price'] ." ".\App\CPU\Helpers::currency_symbol()); ?></td>
                                <td><?php echo e($product->order_count??0); ?></td>
                                <td>
                                    <a class="tio-edit pr-2"
                                                href="<?php echo e(route('admin.product.edit',[$product['id']])); ?>"></a>
                                            <a class="tio-delete form-alert" href="javascript:"
                                               data-id="product-<?php echo e($product['id']); ?>"
                                               data-message="<?php echo e(\App\CPU\translate('Want to delete this product')); ?>?"></a>
                                            <form action="<?php echo e(route('admin.product.delete',[$product['id']])); ?>"
                                                    method="post" id="product-<?php echo e($product['id']); ?>">
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
                            <?php echo $products->links(); ?>

                            </tfoot>
                        </table>
                    </div>
                    <?php if(count($products)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 img-two-spl" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('Image Description')); ?>">
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
            update_quantity(productId);
        });

        $('#sortOrderQtySelect').on('change', function() {
            var selectedValue = $(this).val();
            var redirectUrl = '<?php echo e(url('/')); ?>/admin/supplier/products/<?php echo e($supplier->id); ?>?sort_orderQty=' + selectedValue;
            window.location.href = redirectUrl;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/supplier/product-list.blade.php ENDPATH**/ ?>