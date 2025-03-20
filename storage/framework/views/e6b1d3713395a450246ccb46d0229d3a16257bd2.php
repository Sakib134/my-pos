<?php $__env->startSection('title',\App\CPU\translate('add_new_brand')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3 ">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                        <i class="tio-add-circle-outlined"></i>
                        <span><?php echo e(\App\CPU\translate('add_new_brand')); ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.brand.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><?php echo e(\App\CPU\translate('brand_name')); ?></label>
                                        <input type="text" name="name" class="form-control" placeholder="<?php echo e(\App\CPU\translate('brand_name')); ?>">
                                        <input name="position" value="0" class="d-none">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label><?php echo e(\App\CPU\translate('image')); ?></label><small class="text-danger">* ( <?php echo e(\App\CPU\translate('ratio_1:1')); ?>  )</small>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                        <label class="custom-file-label" for="customFileEg1"><?php echo e(\App\CPU\translate('choose_file')); ?></label>
                                    </div>
                                </div>
                                <div class="col-12 from_part_2">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <img class="img-one-bri" id="viewer"
                                                src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>" alt="image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h5><?php echo e(\App\CPU\translate('brand_table')); ?><span class="badge badge-soft-dark ml-2"><?php echo e($brands->total()); ?></span></h5>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive ">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th ><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('image')); ?></th>
                                <th ><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th class="w-one-bri"><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($brands->firstItem()+$key); ?></td>
                                    <td>
                                        <img class="img-two-bri"
                                        src="<?php echo e($brand['image_fullpath']); ?>" alt="">
                                    </td>
                                    <td>
                                    <span class="d-block font-size-sm text-body">
                                        <?php echo e($brand['name']); ?>

                                    </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-white mr-1"
                                           href="<?php echo e(route('admin.brand.edit',[$brand['id']])); ?>"><span class="tio-edit"></span></a>
                                        <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                           data-id="brand-<?php echo e($brand['id']); ?>"
                                           data-message="<?php echo e(\App\CPU\translate('Want to delete this brand')); ?>?">
                                            <span class="tio-delete"></span>
                                        </a>
                                        <form action="<?php echo e(route('admin.brand.delete',[$brand['id']])); ?>"
                                              method="post" id="brand-<?php echo e($brand['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <hr>
                        <table>
                            <tfoot>
                            <?php echo $brands->links(); ?>

                            </tfoot>
                        </table>
                        <?php if(count($brands)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-two-bri" src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg" alt="<?php echo e(\App\CPU\translate('image_description')); ?>">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset("public/assets/admin/js/global.js")); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/brand/index.blade.php ENDPATH**/ ?>