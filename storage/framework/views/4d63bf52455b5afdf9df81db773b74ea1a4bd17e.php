<?php $__env->startSection('title',\App\CPU\translate('update_product')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                        <i class="tio-edit"></i>
                        <span><?php echo e(\App\CPU\translate('update_product')); ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.product.update',[$product['id']])); ?>" method="post"
                              id="product_form"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('name')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <input type="text" name="name" class="form-control"
                                               value="<?php echo e($product['name']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('product_name')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('product_code_SKU')); ?>

                                            <span class="input-label-secondary">*</span>
                                            <a class="style-one-pu" id="generateCodeLink"><?php echo e(\App\CPU\translate('generate_code')); ?></a></label>
                                        <input type="text" id="generate_number" minlength="5" name="product_code"
                                               class="form-control" value="<?php echo e($product['product_code']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('product_code')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('brand')); ?></label>
                                        <select name="brand_id" class="form-control js-select2-custom">
                                            <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($brand['id']); ?>" <?php echo e($product->brand == $brand['id'] ? 'selected' : ' '); ?>><?php echo e($brand['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('quantity')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <input type="number" min="1" name="quantity" class="form-control"
                                               value="<?php echo e($product['quantity']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('quantity')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('unit_type')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <select name="unit_type" class="form-control js-select2-custom" required>
                                            <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($unit['id']); ?>" <?php echo e($product->unit_type==$unit['id']?'selected':''); ?>><?php echo e($unit['unit_type']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('unit_value')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <input type="number" min="0" name="unit_value" class="form-control"
                                               value="<?php echo e($product['unit_value']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('unit_value')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlSelect1"><?php echo e(\App\CPU\translate('category')); ?><span
                                                class="input-label-secondary">*</span></label>
                                        <select name="category_id" id="category-id"
                                                class="form-control js-select2-custom">
                                            <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category['id']); ?>" <?php echo e($category->id==$product_category[0]->id ? 'selected' : ''); ?>><?php echo e($category['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlSelect1"><?php echo e(\App\CPU\translate('sub_category')); ?>

                                            <span
                                                class="input-label-secondary"></span></label>
                                        <select name="sub_category_id" id="sub-categories"
                                                data-id="<?php echo e(count($product_category)>=2?$product_category[1]->id:''); ?>"
                                                class="form-control js-select2-custom">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('selling_price')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <input type="number" step="0.01" name="selling_price" class="form-control"
                                               value="<?php echo e($product['selling_price']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('selling_price')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('purchase_price')); ?>

                                            <span class="input-label-secondary">*</span>
                                        </label>
                                        <input type="number" step="0.01" name="purchase_price" class="form-control"
                                               value="<?php echo e($product['purchase_price']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('purchase_price')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('discount_type')); ?></label>
                                        <select name="discount_type" class="form-control js-select2-custom">
                                            <option value="percent" <?php echo e($product->discount_type == 'percent'?'selected':''); ?> ><?php echo e(\App\CPU\translate('percent')); ?></option>
                                            <option value="amount" <?php echo e($product->discount_type == 'amount'?'selected':''); ?>><?php echo e(\App\CPU\translate('amount')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label id="percent" class="input-label <?php echo e($product->discount_type == 'amount' ? 'd-none' :''); ?>"><?php echo e(\App\CPU\translate('discount_percent')); ?> (%)</label>
                                        <label id="amount" class="input-label <?php echo e($product->discount_type == 'percent' ? 'd-none' :''); ?>"><?php echo e(\App\CPU\translate('discount_amount')); ?></label>
                                        <input type="number" min="0" name="discount" class="form-control"
                                               value="<?php echo e($product['discount']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('discount')); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('tax_in_percent')); ?>

                                            (%)</label>
                                        <input type="number" min="0" name="tax" class="form-control"
                                               value="<?php echo e($product['tax']); ?>"
                                               placeholder="<?php echo e(\App\CPU\translate('tax')); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('select_supplier')); ?></label>
                                        <select name="supplier_id" class="form-control js-select2-custom">
                                            <option value="">---<?php echo e(\App\CPU\translate('select')); ?>---</option>
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($supplier['id']); ?>" <?php echo e($product->supplier_id==$supplier['id']?'selected':''); ?>><?php echo e($supplier['name']); ?>

                                                    (<?php echo e($supplier['mobile']); ?>)
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="col-12">
                                    <label><?php echo e(\App\CPU\translate('image')); ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label"
                                               for="customFileEg1"><?php echo e(\App\CPU\translate('choose_file')); ?></label>
                                    </div>
                                    <div class="form-group my-4">
                                        <div class="text-center">
                                            <img class="img-one-pu" id="viewer"
                                                 src="<?php echo e($product['image_fullpath']); ?>"
                                                 alt="<?php echo e(\App\CPU\translate('image')); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('update')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        "use strict";

        $(document).ready(function () {
            setTimeout(function () {
                let category = $("#category-id").val();
                let sub_category = '<?php echo e(count($product_category)>=2?$product_category[1]->id:''); ?>';
                getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id=' + category + '&&sub_category=' + sub_category, 'sub-categories');
            }, 1000)

            $('#generateCodeLink').on('click', function(e) {
                e.preventDefault();
                document.getElementById('generate_number').value = getRndInteger();
            });

            $('select[name="category_id"]').on('change', function() {
                getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id=' + $(this).val(), 'sub-categories');
            });

            $('select[name="sub_category_id"]').on('change', function() {
                getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id=' + $(this).val(), 'sub-sub-categories');
            });

            $('select[name="discount_type"]').on('change', function() {
                discount_option(this);
            });
        });
    </script>

    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/product/edit.blade.php ENDPATH**/ ?>