<?php $__env->startSection('title', \App\CPU\translate('add_new_category')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title d-flex align-items-center g-2px text-capitalize">
                        <i class="tio-add-circle-outlined"></i>
                        <span><?php echo e(\App\CPU\translate('add_new_category')); ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.category.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for=""><?php echo e(\App\CPU\translate('category_name')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('add_category_name')); ?>">
                                        <input name="position" value="0" class="d-none">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label><?php echo e(\App\CPU\translate('image')); ?></label> (
                                        <?php echo e(\App\CPU\translate('ratio_1:1')); ?> )</small>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label"
                                            for="customFileEg1"><?php echo e(\App\CPU\translate('choose_file')); ?> </label>
                                    </div>
                                </div>
                                <div class="col-12 from_part_2">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <img class="img-one-cati" id="viewer"
                                                src="<?php echo e(asset('public/assets/admin/img/400x400/img2.jpg')); ?>"
                                                alt="<?php echo e(\App\CPU\translate('image')); ?>" />
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
                        <div class="w-100">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-6 col-lg-7 col-xl-8">
                                    <h5><?php echo e(\App\CPU\translate('category_table')); ?>

                                        <span class="badge badge-soft-dark"><?php echo e($categories->total()); ?></span>
                                    </h5>


                                </div>
                                <div class=" col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                                   placeholder="<?php echo e(\App\CPU\translate('search_by_category')); ?>"
                                                   aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                            <button type="submit"
                                                    class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive ">
                        <table
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('image')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($categories->firstitem() + $key); ?></td>
                                        <td>
                                            <img src="<?php echo e($category['image_fullpath']); ?>"
                                                class="img-two-cati">
                                        </td>
                                        <td>
                                            <span class="d-block font-size-sm text-body">
                                                <?php echo e($category['name']); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <label class="toggle-switch toggle-switch-sm">
                                                <input type="checkbox" class="toggle-switch-input change-status"
                                                       data-route="<?php echo e(route('admin.category.status', [$category['id'], $category->status ? 0 : 1])); ?>"
                                                    class="toggle-switch-input" <?php echo e($category->status ? 'checked' : ''); ?>>
                                                <span class="toggle-switch-label">
                                                    <span class="toggle-switch-indicator"></span>
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <a class="btn btn-white mr-1"
                                                href="<?php echo e(route('admin.category.edit', [$category['id']])); ?>">
                                                <span class="tio-edit"></span>
                                            </a>
                                            <a class="btn btn-white mr-1 form-alert" href="javascript:"
                                               data-id="category-<?php echo e($category['id']); ?>"
                                               data-message="<?php echo e(\App\CPU\translate('Want to delete this category')); ?>?">
                                                <span class="tio-delete"></span>
                                            </a>
                                            <form action="<?php echo e(route('admin.category.delete', [$category['id']])); ?>"
                                                method="post" id="category-<?php echo e($category['id']); ?>">
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
                                <?php echo $categories->links(); ?>

                            </tfoot>
                        </table>
                        <?php if(count($categories) == 0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-one-cati"
                                    src="<?php echo e(asset('public/assets/admin')); ?>/svg/illustrations/sorry.svg"
                                    alt="Image Description">
                                <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset('public/assets/admin/js/global.js')); ?>></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/category/index.blade.php ENDPATH**/ ?>