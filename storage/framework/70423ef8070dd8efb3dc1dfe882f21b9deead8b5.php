<?php $__env->startPush('css_or_js'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin')); ?>/css/custom.css"/>
<?php $__env->stopPush(); ?>
<ul class="list-group list-group-flush" id="productList">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item">
            <a href="#" data-product-id="<?php echo e($i->id); ?>" class="add-to-cart-link">
                <?php echo e($i['name']); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<script>
    "use strict";

    $('#productList').on('click', '.add-to-cart-link', function(e) {
        e.preventDefault();
        var productName = $(this).text();
        $('.search-bar-input-mobile').val(productName);
        $('.search-bar-input').val(productName);
        var productId = $(this).data('product-id');
        addToCart(productId);
    });
</script>
<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/pos/_search-result.blade.php ENDPATH**/ ?>