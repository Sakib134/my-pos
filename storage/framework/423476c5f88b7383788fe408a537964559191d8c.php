<div id="headerMain" class="d-none">
    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered header-style">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">
                <?php ($shop_logo=\App\Models\BusinessSetting::where(['key'=>'shop_logo'])->first()->value); ?>
                <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>" aria-label="">
                    <img class="navbar-brand-logo"
                         src="<?php echo e(onErrorImage($shop_logo,asset('storage/app/public/shop').'/' . $shop_logo,asset('public/assets/admin/img/160x160/img2.jpg') ,'shop/')); ?>" alt="<?php echo e(\App\CPU\translate('Logo')); ?>">
                </a>
            </div>

            <div class="navbar-nav-wrap-content-left">
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                       data-placement="right" title="<?php echo e(\App\CPU\translate('Collapse')); ?>"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                       data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-toggle="tooltip" data-placement="right" title="<?php echo e(\App\CPU\translate('Expand')); ?>"></i>
                </button>
            </div>
            <div class="navbar-nav-wrap-content-right">
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item d-sm-inline-block">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary"
                               href="<?php echo e(route('admin.pos.index')); ?>" target="_blank">
                                <span class="m-3 text-white"><?php echo e(\App\CPU\translate('POS')); ?></span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item d-sm-inline-block">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('admin.pos.orders')); ?>">
                                <i class="tio-shopping-basket text-white"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img"
                                         src="<?php echo e(auth('admin')->user()->image_fullpath); ?>"
                                         alt="<?php echo e(\App\CPU\translate('image_description')); ?>">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img"
                                                 src="<?php echo e(auth('admin')->user()->image_fullpath); ?>"
                                                 alt="<?php echo e(\App\CPU\translate('image_description')); ?>">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5"><?php echo e(auth('admin')->user()->f_name); ?></span>
                                            <span class="card-text"><?php echo e(auth('admin')->user()->email); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.settings')); ?>">
                                    <span class="text-truncate pr-2"
                                          title="<?php echo e(\App\CPU\translate('settings')); ?>"><?php echo e(\App\CPU\translate('settings')); ?></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:" id="logoutLink">
                                    <span class="text-truncate pr-2" title="Sign out"><?php echo e(\App\CPU\translate('sign_out')); ?></span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>

<?php $__env->startPush('script_2'); ?>
<script>
    "use strict";

    $(document).on('click', '#logoutLink', function(e) {
        e.preventDefault();

        Swal.fire({
            title: '<?php echo e(\App\CPU\translate('Do you want to logout')); ?>?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonColor: '#FC6A57',
            cancelButtonColor: '#363636',
            confirmButtonText: `<?php echo e(\App\CPU\translate('Yes')); ?>`,
            denyButtonText: `<?php echo e(\App\CPU\translate('Don\'t Logout')); ?>'`,
        }).then((result) => {
            if (result.value) {
                window.location.href = '<?php echo e(route('admin.auth.logout')); ?>';
            } else {
                Swal.fire('<?php echo e(\App\CPU\translate('Canceled')); ?>', '', '<?php echo e(\App\CPU\translate('info')); ?>');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/layouts/admin/partials/_header.blade.php ENDPATH**/ ?>