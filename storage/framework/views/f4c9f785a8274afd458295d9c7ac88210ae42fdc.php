<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/assets/installation')); ?>/assets/img/favicon.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/installation')); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/installation')); ?>/assets/css/style.css">
</head>

<body>
<section style="background-image: url('<?php echo e(asset('public/assets/installation')); ?>/assets/img/page-bg.png')"
         class="w-100 min-vh-100 bg-img position-relative py-5">

    <div class="logo">
        <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/favicon.svg" alt="">
    </div>

    <div class="custom-container">
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="footer py-3 mt-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 align-items-center">
                <div class="footer-logo">
                    <img src="<?php echo e(asset('public/assets/installation')); ?>/assets/img/logo.svg" alt="">
                </div>
                <p class="copyright-text mb-0">© 2023 | All Rights Reserved</p>
            </div>
        </footer>
    </div>
</section>
</body>

<script src="<?php echo e(asset('public/assets/installation')); ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('public/assets/installation')); ?>/assets/js/script.js"></script>
<?php echo Toastr::message(); ?>


<script>
    const passwordField = document.getElementById('password');
    const confirmationField = document.getElementById('confirm_password');

    confirmationField.addEventListener('input', () => {
        if (confirmationField.value === '') {
            console.log('a');
            confirmationField.setCustomValidity('');
            return;
        }

        if (passwordField.value === confirmationField.value) {
            console.log('b');
            confirmationField.setCustomValidity('');
        } else {
            confirmationField.setCustomValidity('The passwords do not match');
            console.log('c');
        }
    });
</script>

</html>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/layouts/blank.blade.php ENDPATH**/ ?>