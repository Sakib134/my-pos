
<div id="sidebarMain" class="d-none">
    <aside class="aside-back js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container text-capitalize">
            <div class="navbar-vertical-footer-offset">
                <div class="navbar-brand-wrapper justify-content-between nav-brand-back side-logo">
                    <?php ($shop_logo=\App\Models\BusinessSetting::where(['key'=>'shop_logo'])->first()->value); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>" aria-label="<?php echo e(\App\CPU\translate('Front')); ?>">
                        <img class="navbar-brand-logo"
                             src="<?php echo e(onErrorImage($shop_logo, asset('storage/app/public/shop').'/' . $shop_logo,asset('public/assets/admin/img/160x160/img2.jpg') ,'shop/')); ?>"
                             alt="<?php echo e(\App\CPU\translate('logo')); ?>">
                    </a>
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>

                <div class="navbar-vertical-content">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('dashboard_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.dashboard')); ?>" title="<?php echo e(\App\CPU\translate('dashboards')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <?php if(\App\CPU\Helpers::module_permission_check('pos_section')): ?>
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('pos_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <?php ($orders = \App\Models\Order::get()->count()); ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/pos*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-shopping nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('POS')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/pos*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/pos/')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.pos.index')); ?>"
                                       title="<?php echo e(\App\CPU\translate('POS')); ?>" target="_blank">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('pos')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/pos/orders')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.pos.orders')); ?>"
                                       title="<?php echo e(\App\CPU\translate('orders')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('orders')); ?>

                                            <span class="badge badge-success ml-2"><?php echo e($orders); ?> </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php
                        $modules = ['category_section', 'brand_section', 'unit_section', 'product_section', 'stock_section'];
                        ?>
                        <?php if(collect($modules)->contains(fn($module) => \App\CPU\Helpers::module_permission_check($module))): ?>
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('product_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('category_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/category*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-category nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('category')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/category*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/category/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.category.add')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_category')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('category')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/category/add-sub-category')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.category.add-sub-category')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_sub_category')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('sub_category')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('brand_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.brand.add')); ?>">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('brand')); ?>

                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('unit_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/unit*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.unit.index')); ?>">
                                <i class="tio-calculator nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('unit')); ?>

                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('product_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/product*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-premium-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('product')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/product*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/product/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.product.add')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_product')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('add_new')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/product/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.product.list')); ?>"
                                       title="<?php echo e(\App\CPU\translate('list_of_products')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('list')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/product/bulk-import')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.product.bulk-import')); ?>"
                                       title="<?php echo e(\App\CPU\translate('bulk_import')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('bulk_import')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/product/bulk-export')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.product.bulk-export')); ?>"
                                       title="<?php echo e(\App\CPU\translate('bulk_export')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('bulk_export')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('stock_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/stock*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.stock.stock-limit')); ?>">
                                <i class="tio-warning nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('stock_limit_products')); ?>

                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php
                        $modules = ['coupon_section', 'account_section'];
                        ?>
                        <?php if(collect($modules)->contains(fn($module) => \App\CPU\Helpers::module_permission_check($module))): ?>
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('business_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('coupon_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.coupon.add-new')); ?>">
                                <i class="tio-gift nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('coupons')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('account_section')): ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/account*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-wallet nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('account_management')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/account*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/account/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.add')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_account')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('add_new_account')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/account/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.list')); ?>"
                                       title="<?php echo e(\App\CPU\translate('account_list')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('accounts')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/account/add-expense')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.add-expense')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_expense')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('new_expense')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/account/add-income')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.add-income')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_income')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('new_income')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/account/add-transfer')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.add-transfer')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_transfer')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('new_transfer')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('admin/account/list-transection')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.account.list-transection')); ?>"
                                       title="<?php echo e(\App\CPU\translate('list_of_transection')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('transection_list')); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php
                        $modules = ['employee_role_section', 'employee_section'];
                        ?>
                        <?php if(collect($modules)->contains(fn($module) => \App\CPU\Helpers::module_permission_check($module))): ?>
                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(\App\CPU\translate('Employee Section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*') || Request::is('admin/employee*') ? 'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-poi-user nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('Employee')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/custom-role*') || Request::is('admin/employee*') ?'d-block':''); ?>">
                                <?php if(\App\CPU\Helpers::module_permission_check('employee_role_section')): ?>
                                <li class="nav-item <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.custom-role.create')); ?>"
                                       title="<?php echo e(\App\CPU\translate('Employee_Role_Setup')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('Employee Role')); ?></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if(\App\CPU\Helpers::module_permission_check('employee_section')): ?>
                                <li class="nav-item <?php echo e(Request::is('admin/employee*')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.employee.add-new')); ?>"
                                       title="<?php echo e(\App\CPU\translate('Employee_add')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('Add Employee')); ?></span>
                                    </a>
                                </li>
                                    <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('customer_section')): ?>
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('customer_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-poi-user nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('customer')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/customer*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/customer/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.customer.add')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_customer')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('add_customer')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/customer/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>"
                                       title="<?php echo e(\App\CPU\translate('list_of_customers')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('customer_list')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('supplier_section')): ?>
                        <li class="nav-item">
                            <small
                                class="nav-subtitle"><?php echo e(\App\CPU\translate('supplier_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/supplier*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-users-switch nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('supplier')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/supplier*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/supplier/add')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.supplier.add')); ?>"
                                       title="<?php echo e(\App\CPU\translate('add_new_supplier')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('add_supplier')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('admin/supplier/list')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.supplier.list')); ?>"
                                       title="<?php echo e(\App\CPU\translate('list_of_suppliers')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('supplier_list')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(\App\CPU\Helpers::module_permission_check('setting_section')): ?>
                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(\App\CPU\translate('shop_setting_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-settings nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('settings')); ?></span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub <?php echo e(Request::is('admin/business-settings*')?'d-block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('admin/business-settings/shop-setup')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('admin.business-settings.shop-setup')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('shop')); ?> <?php echo e(\App\CPU\translate('setup')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item pt-8">

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>



<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/layouts/admin/partials/_sidebar.blade.php ENDPATH**/ ?>