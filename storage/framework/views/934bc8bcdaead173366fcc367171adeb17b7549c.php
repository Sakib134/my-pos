<?php $__env->startSection('title',\App\CPU\translate('product_bulk_import')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a
                        href="<?php echo e(route('admin.product.list')); ?>"><?php echo e(\App\CPU\translate('product')); ?></a>
                </li>
                <li class="breadcrumb-item"><?php echo e(\App\CPU\translate('bulk_import')); ?> </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="jumbotron bg-white">
                    <h1 class="display-4">Instructions : </h1>
                    <p> <?php echo e(\App\CPU\translate('1._Download_the_format_file_and_fill_it_with_proper_data')); ?>.</p>

                    <p><?php echo e(\App\CPU\translate('2._You_can_download_the_example_file_to_understand_how_the_data_must_be_filled')); ?>.</p>

                    <p><?php echo e(\App\CPU\translate('3._Once_you_have_downloaded_and_filled_the_format_file,_upload_it_in_the_form_below_and_submit')); ?>.</p>

                    <p> <?php echo e(\App\CPU\translate("4._After_uploading_products_you_need_to_edit_them_and_set_product's_images_and_choices")); ?>.</p>

                    <p> <?php echo e(\App\CPU\translate("5._You_can_get_category_and_sub-category_id_from_their_list,_please_input_the_right_ids")); ?>.</p>

                </div>
            </div>

            <div class="col-md-12">
                <form class="product-form" action="<?php echo e(route('admin.product.bulk-import')); ?>" method="POST"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('import_products_file')); ?></h4>
                            <a href="<?php echo e(asset('public/assets/product_bulk_format.xlsx')); ?>" download=""
                               class="btn btn-secondary"><?php echo e(\App\CPU\translate('Download_Format')); ?></a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="products_file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-footer">
                        <div class="row">
                            <div class="col-md-12 pt-3">
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/product/bulk-import.blade.php ENDPATH**/ ?>