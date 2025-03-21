<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo e(\App\CPU\translate('admin')); ?> | <?php echo e(\App\CPU\translate('login')); ?></title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/google-fonts.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/vendor/icon-set/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/auth-page.css">

</head>

<body class="bg-one-auth">
<main id="content" role="main" class="main">

                <?php ($shop_logo=\App\Models\BusinessSetting::where(['key'=>'shop_logo'])->first()->value); ?>
    <div class="auth-wrapper">
        <div class="auth-wrapper-left" style="background: url('<?php echo e(asset('/public/assets/admin/img/auth-bg.png')); ?>') no-repeat center left/cover">
            <div class="auth-left-cont">
                <img class="onerror-image"
                    src="<?php echo e(onErrorImage($shop_logo,asset('storage/app/public/shop').'/' . $shop_logo,asset('public/assets/admin/img/160x160/img2.jpg') ,'shop/')); ?>"
                    alt="<?php echo e(\App\CPU\translate('Logo')); ?>">
                <h2 class="title"><span class="d-block text-primary"><?php echo e(\App\CPU\translate('The Ultimate')); ?></span> <strong class="color-EC255A"><?php echo e(\App\CPU\translate('POS Solution')); ?>...</strong></h2>
            </div>
        </div>
        <div class="auth-wrapper-right">
            <label class="badge badge-soft-danger __login-badge color-EC255A">
                <?php echo e(\App\CPU\translate('Software version')); ?>: <?php echo e(env('SOFTWARE_VERSION')); ?>

            </label>

            <div class="auth-wrapper-form">

                <form class="js-validate" action="<?php echo e(route('admin.auth.login')); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <div class="auth-header">
                        <div class="mb-5">
                            <h2 class="title"><?php echo e(\App\CPU\translate('Sign In')); ?></h2>
                            <div><?php echo e(\App\CPU\translate('Welcome Back. Login to your panel')); ?></div>
                        </div>
                    </div>
                    <div class="js-form-message form-group">
                <label class="input-label text-capitalize" for="signinSrEmail"><?php echo e(\App\CPU\translate('Your email')); ?></label>
                        <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                tabindex="1" placeholder="<?php echo e(\App\CPU\translate('email@address.com')); ?>"
                                aria-label="<?php echo e(\App\CPU\translate('email@address.com')); ?>"
                                required
                                data-msg="<?php echo e(\App\CPU\translate('Please_enter_a_valid_email_address.')); ?>">
                    </div>

                    <div class="js-form-message form-group">
                        <label class="input-label" for="signupSrPassword" tabindex="0">
                            <span class="d-flex justify-content-between align-items-center">
                                <?php echo e(\App\CPU\translate('Password')); ?>

                            </span>
                        </label>
                        <div class="input-group input-group-merge">
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                    name="password" id="signupSrPassword"
                                    placeholder="<?php echo e(\App\CPU\translate('8+ characters required')); ?>"
                                    aria-label="<?php echo e(\App\CPU\translate('8+ characters required')); ?>" required
                                    data-msg="<?php echo e(\App\CPU\translate('Your password is invalid. Please try again.')); ?>"
                                    data-hs-toggle-password-options='{
                                                "target": "#changePassTarget",
                                    "defaultClass": "tio-hidden-outlined",
                                    "showClass": "tio-visible-outlined",
                                    "classChangeTarget": "#changePassIcon"
                                    }'>
                            <div id="changePassTarget" class="input-group-append">
                                <a class="input-group-text" href="javascript:">
                                    <i id="changePassIcon" class="tio-visible-outlined"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-primary mt-5"><?php echo e(\App\CPU\translate('sign_in')); ?></button>
                </form>

                <?php if(env('APP_MODE')=='demo'): ?>
                    <div class="auto-fill-data-copy">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div>
                                <span class="d-block"><strong><?php echo e(\App\CPU\translate('Email')); ?> </strong> : <?php echo e(\App\CPU\translate('admin@admin.com')); ?></span>
                                <span class="d-block"><strong><?php echo e(\App\CPU\translate('Password')); ?> </strong> : <?php echo e(\App\CPU\translate('12345678')); ?></span>
                            </div>
                            <div>
                                <button class="btn action-btn btn--primary m-0 copy_cred"><i class="tio-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div>

        </div>
    </div>
</main>


<script src="<?php echo e(asset('public/assets/admin')); ?>/js/vendor.min.js"></script>

<script src="<?php echo e(asset('public/assets/admin')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/admin')); ?>/js/toastr.js"></script>
<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        "use strict";
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<script>
    $(document).on('ready', function(){

        $(".direction-toggle").on("click", function () {
            setDirection(localStorage.getItem("direction"));
        });

        function setDirection(direction) {
            if (direction == "rtl") {
                localStorage.setItem("direction", "ltr");
                $("html").attr('dir', 'ltr');
            $(".direction-toggle").find('span').text('Toggle RTL')
            } else {
                localStorage.setItem("direction", "rtl");
                $("html").attr('dir', 'rtl');
            $(".direction-toggle").find('span').text('Toggle LTR')
            }
        }

        if (localStorage.getItem("direction") == "rtl") {
            $("html").attr('dir', "rtl");
            $(".direction-toggle").find('span').text('Toggle LTR')
        } else {
            $("html").attr('dir', "ltr");
            $(".direction-toggle").find('span').text('Toggle RTL')
        }

    })
</script>
<script src="<?php echo e(asset('public/assets/admin')); ?>/js/auth-page.js"></script>

<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/auth/login.blade.php ENDPATH**/ ?>