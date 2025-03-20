<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="font-size-sm mb-0">
                <?php ($shop_name=\App\Models\BusinessSetting::where('key','shop_name')->first()->value); ?>
                <?php ($footer_text=\App\Models\BusinessSetting::where('key','footer_text')->first()->value); ?>
                &copy; <?php echo e($shop_name); ?>. <span
                    class="d-none d-sm-inline-block"><?php echo e($footer_text); ?></span>
            </p>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <ul class="list-inline list-separator">
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.business-settings.shop-setup')); ?>"><?php echo e(\App\CPU\translate('settings')); ?></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.settings')); ?>"><?php echo e(\App\CPU\translate('profile')); ?></a>
                    </li>
                    <li class="list-inline-item">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="tio-home-outlined"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/layouts/admin/partials/_footer.blade.php ENDPATH**/ ?>