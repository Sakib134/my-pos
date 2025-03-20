<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo e(\App\CPU\translate('Product Barcode')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/bootstrap.css" />
    <style>
        @font-face {
            font-family: 'DejaVuSans';
            src: url('../public/assets/admin/font/ttf/DejaVuSans.ttf');
        }
        .text-capitalize {
            text-transform: uppercase;
        }

        .text-bold {
            font-weight: bold;
        }
        .currency {
            font-family: DejaVuSans;
        }

    </style>
</head>

<body>
    <?php if($quantity): ?>
        <div class="container">
            <div class="row">
                <?php for($i = 0; $i < $quantity; $i++): ?>
                    <?php if($i % 3 == 0 && $i != 0): ?>
            </div>
            <div class="row">
    <?php endif; ?>
    <div class="col-xs-4">
        <span class="text-capitalize text-bold"><?php echo e(\App\Models\BusinessSetting::where('key', 'shop_name')->first()->value); ?></span>
        <br>
        <span class="product-name"><?php echo e(Str::limit($product->name, 30)); ?></span> <br>
        <span class="currency">
            <?php echo e($product['selling_price'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

        </span> <br>
        <span class="bar-code"><?php echo DNS1D::getBarcodeHTML($product->product_code, 'C128'); ?></span>
        <p class=""><?php echo e(\App\CPU\translate('code')); ?> :
            <?php echo e($product->product_code); ?></p>
    </div>
    <?php endfor; ?>
    </div>
    </div>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/product/barcode-pdf.blade.php ENDPATH**/ ?>