<?php $__env->startSection('title', $product->name . ' ' . \App\CPU\translate('barcode') . ' ' . date("Y/m/d")); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/barcode.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row m-2 show-div">
        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <table
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('code')); ?></th>
                                <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th><?php echo e(\App\CPU\translate('quantity')); ?></th>
                                <th><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <th><?php echo e($product->product_code); ?></th>
                                        <th><?php echo e(Str::limit($product->name,30)); ?></th>
                                        <th>
                                            <input type="number" name="limit" value="<?php echo e($limit); ?>"><br>
                                            <span class="text-danger"><?php echo e(\App\CPU\translate('maximum_quantity_270')); ?></span>
                                        </th>
                                        <th>
                                            <button class="btn btn-info" type="submit"><?php echo e(\App\CPU\translate('generate_bercode')); ?></button>
                                            <a class="btn btn-danger"
                                               href="<?php echo e(route('admin.product.barcode-generate',[$product['id']])); ?>"><?php echo e(\App\CPU\translate('reset')); ?>

                                            </a>
                                            <button type="button" id="print_bar" data-name="printarea" class="btn btn-primary print-div"><?php echo e(\App\CPU\translate('print')); ?></button>
                                        </th>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-5 p-4">
            <h1 class="style-one-br show-div2">
                <?php echo e(\App\CPU\translate("This page is for A4 size page printer, so it won't be visible in smaller devices")); ?>.
            </h1>
        </div>
    </div>

    <div id="printarea" class="show-div">
        <?php if($limit): ?>
            <div class="barcodea4">
                <?php for($i = 0; $i <$limit; $i++): ?>
                    <?php if($i%27==0 && $i!=0): ?>
            </div>
            <div class="barcodea4">
                <?php endif; ?>
                <div class="item style24">
                    <span
                        class="barcode_site text-capitalize"><?php echo e(\App\Models\BusinessSetting::where('key','shop_name')->first()->value); ?></span>
                    <span class="barcode_name text-capitalize"><?php echo e(Str::limit($product->name,30)); ?></span>
                    <span class="barcode_price text-capitalize">
                            <?php echo e($product['selling_price'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                        </span>
                    <span class="barcode_image"><?php echo DNS1D::getBarcodeHTML($product->product_code, "C128"); ?></span>
                    <span
                        class="barcode_code text-capitalize"><?php echo e(\App\CPU\translate('code')); ?> : <?php echo e($product->product_code); ?></span>
                </div>

                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/product/barcode-generate.blade.php ENDPATH**/ ?>