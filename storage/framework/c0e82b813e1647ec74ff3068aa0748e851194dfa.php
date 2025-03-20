<?php $__env->startSection('title',\App\CPU\translate('custom_role')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .check--item-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 30px -5px -30px -10px;
        }
        .check-item {
            width: 50%;
            max-width: 248px;
            padding: 0 5px 30px;
        }
        .form--check {
            padding-inline-start: 30px!important;
            cursor: pointer;
            margin-bottom: 0;
            position: relative;
        }
        .form-check-input {
            cursor: pointer;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <div class="page-header">
            <h1 class="page-header-title mb-2 text-capitalize">
                <i class="tio-edit"></i>
                <span><?php echo e(\App\CPU\translate('Employee_Role')); ?></span>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.custom-role.update',[$role['id']])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="lang_form">
                                <div class="form-group">
                                    <label class="input-label " for="name"><?php echo e(\App\CPU\translate('role_name')); ?></label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e($role?->name); ?>"
                                           placeholder="<?php echo e(\App\CPU\translate('role_name')); ?>" >
                                </div>
                            </div>
                            <div class="d-flex">
                                <h5 class="input-label m-0 text-capitalize"><?php echo e(\App\CPU\translate('module_permission')); ?> : </h5>
                                <div class="check-item pb-0 w-auto">
                                    <div class="form-group form-check form--check m-0 ml-2">
                                        <input type="checkbox" name="modules[]" value="account" class="form-check-input"
                                               id="select-all">
                                        <label class="form-check-label ml-2" for="select-all"><?php echo e(\App\CPU\translate('Select_All')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row check--item-wrapper">
                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="check-item">
                                        <div class="form-group form-check form--check">
                                            <input type="checkbox" name="modules[]" value="<?php echo e($module); ?>" class="form-check-input" <?php echo e(in_array($module, (array)json_decode($role['modules'])) ? 'checked' : ''); ?> id="<?php echo e($module); ?>">
                                            <label class="form-check-label ml-2 ml-sm-3 text-dark" for="<?php echo e($module); ?>"><?php echo e(ucwords(str_replace('_', ' ', $module))); ?></label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset('public/assets/admin/js/global.js')); ?>></script>

    <script>
        $('#select-all').on('change', function(){
            if(this.checked === true) {
                $('.check--item-wrapper .check-item .form-check-input').attr('checked', true)
            } else {
                $('.check--item-wrapper .check-item .form-check-input').attr('checked', false)
            }
        })

        $('.check--item-wrapper .check-item .form-check-input').on('change', function(){
            if(this.checked === true) {
                $(this).attr('checked', true)
            } else {
                $(this).attr('checked', false)
            }
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/role/edit.blade.php ENDPATH**/ ?>