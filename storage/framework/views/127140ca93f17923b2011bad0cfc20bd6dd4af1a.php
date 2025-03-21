<div id="<?php echo e($product->id); ?>" class="">
    <input type="hidden" id="product_id" name="id" value="<?php echo e($product->id); ?>">
    <input type="hidden" id="product_qty" name="quantity" value=1>
    <a data-id="<?php echo e($product->id); ?>" class="pos-product-item card single-cart-data">
        <div class="pos-product-item_thumb">
            <img src="<?php echo e($product['image_fullpath']); ?>"
            class="img-fit">
        </div>
        <div class="pos-product-item_content">
            <div class="pos-product-item_title"><?php echo e($product['name']); ?></div>
            <div class="pos-product-item_price">
                <?php echo e(($product['selling_price']- \App\CPU\Helpers::discount_calculate($product, $product['selling_price'])) . ' ' . \App\CPU\Helpers::currency_symbol()); ?>


                <?php if($product->discount > 0): ?>
                    <span class="fz-10 text-muted text-decoration">
                        <?php echo e($product['selling_price'] . ' ' . \App\CPU\Helpers::currency_symbol()); ?>

                    </span><br>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>



<?php /**PATH /home/sites/37b/8/88e140d5f0/public_lmm/pos/resources/views/admin-views/pos/_single_product.blade.php ENDPATH**/ ?>