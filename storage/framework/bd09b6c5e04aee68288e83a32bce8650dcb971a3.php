<?php $__env->startSection('title',\App\CPU\translate('add_new_customer')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize"><i
                        class="tio-add-circle-outlined"></i> <?php echo e(\App\CPU\translate('add_new_customer')); ?>

                </h1>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12  mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.customer.store')); ?>" method="post" id="product_form"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <input type="hidden"   class="form-control" name="balance"  value= 0>
                                <div class="row pl-2" >
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" ><?php echo e(\App\CPU\translate('customer_name')); ?> <span
                                                    class="input-label-secondary text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(\App\CPU\translate('customer_name')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(\App\CPU\translate('mobile_no')); ?> <span
                                                    class="input-label-secondary text-danger">*</span> </label>
                                            <input type="tel" id="mobile" name="mobile" class="form-control" value="<?php echo e(old('mobile')); ?>"
                                                   pattern="[+0-9]+"
                                                   title="Please enter a valid phone number with only numbers and the plus sign (+)"
                                                   placeholder="<?php echo e(\App\CPU\translate('mobile_no')); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-2" >
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" ><?php echo e(\App\CPU\translate('email')); ?></label>
                                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(\App\CPU\translate('Ex_:_ex@example.com')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label" ><?php echo e(\App\CPU\translate('state')); ?></label>
                                            <input type="text" name="state" class="form-control" value="<?php echo e(old('state')); ?>" placeholder="<?php echo e(\App\CPU\translate('state')); ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-2" >
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(\App\CPU\translate('city')); ?> </label>
                                            <input type="text" name="city" class="form-control" value="<?php echo e(old('city')); ?>" placeholder="<?php echo e(\App\CPU\translate('city')); ?>" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(\App\CPU\translate('zip_code')); ?> </label>
                                            <input type="text" name="zip_code" class="form-control" value="<?php echo e(old('zip_code')); ?>" placeholder="<?php echo e(\App\CPU\translate('zip_code')); ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row pl-2" >

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(\App\CPU\translate('address')); ?> </label>
                                            <input type="text"  name="address" class="form-control" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(\App\CPU\translate('address')); ?>" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label><?php echo e(\App\CPU\translate('image')); ?></label><small> ( <?php echo e(\App\CPU\translate('ratio_1:1')); ?>  )( <?php echo e(\App\CPU\translate('optional')); ?>  )</small>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                                            <label class="custom-file-label" for="customFileEg1"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                        </div>
                                        <div class="form-group my-4">
                                            <div class="text-center">
                                                <img class="img-one-ci" id="viewer"
                                                    src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="<?php echo e(\App\CPU\translate('image')); ?>"/>
                                            </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/customer/index.blade.php ENDPATH**/ ?>