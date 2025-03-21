<?php $__env->startSection('title',\App\CPU\translate('category_update')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title text-capitalize"><i class="tio-edit"></i> <?php echo e(\App\CPU\translate('category_update')); ?></h1>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.category.update',[$category['id']])); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group lang_form">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('name')); ?> </label>
                                        <input type="text" name="name" value="<?php echo e($category['name']); ?>" class="form-control" placeholder="<?php echo e(\App\CPU\translate('new_category')); ?>" required>
                                    </div>
                                    <input name="position" value="0" class="d-none">
                                </div>
                                <?php if($category['parent_id'] == 0): ?>
                                    <div class="col-12 col-sm-6 from_part_2">
                                        <div class="form-group">
                                            <label><?php echo e(\App\CPU\translate('image')); ?></label><small class="text-danger">* ( <?php echo e(\App\CPU\translate('ratio_1:1')); ?>  )</small>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                                    accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label" for="customFileEg1"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 from_part_2">
                                        <div class="text-center">
                                            <img class="img-one-catu" id="viewer"
                                                src="<?php echo e($category['image_fullpath']); ?>" alt=""/>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/category/edit.blade.php ENDPATH**/ ?>