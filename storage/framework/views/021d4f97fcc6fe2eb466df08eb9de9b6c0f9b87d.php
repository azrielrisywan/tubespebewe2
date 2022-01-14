<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Cart & Checkout')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <?php if($cartCount <= 0): ?>
                        <a href="<?php echo e(route('transaksi')); ?>" ><button class="form-control col-md-1 btn btn-dark mx-2 btn-sm">Back</button></a>
                        Cart Kosong
                    <?php else: ?>
                    <div class="table table-responsive">
                        <a href="<?php echo e(route('transaksi')); ?>" ><button class="form-control col-md-2 btn btn-dark">Back to Transaksi</button></a>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col" class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data['id']); ?></td>
                                    <td><?php echo e($data['name']); ?></td>
                                    <td><?php echo e($data['qty']); ?></td>
                                    <td>Rp<?php echo e(number_format($data['price'])); ?></td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('checkout.removeitem')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php
                                                $produk_id = '';
                                                $itemqty = 0;
                                                foreach ($produks as $produk) {
                                                    if ($data['id'] == $produk->id) {
                                                        $produk_id = $produk->id;
                                                    }
                                                }
                                                foreach ($cart as $data) {
                                                    if ($data['id'] == $produk_id) {
                                                        $itemqty = $data['qty'];
                                                    }
                                                }
                                            ?>
                                            <input type="hidden" name="produk_id" value="<?php echo e($produk_id); ?>">
                                            <button type="submit" class="form-control col-md-12 mt-1 btn btn-warning btn-sm">Remove Item</button>
                                        </form>
                                        <form method="post" action="<?php echo e(route('checkout.editquantity')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="produk_id" value="<?php echo e($produk_id); ?>">
                                            <input type="number" class="form-control col-md-12 mt-1" name="quantity" value="<?php echo e($itemqty); ?>">
                                            <button type="submit" class="form-control col-md-12 mt-1 btn btn-outline-secondary btn-sm">Edit Quantity</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan=""><?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::priceTotal()); ?></th>
                            </tr>
                            <tr>
                                <th colspan="4"></th>
                                <form method="post" action="<?php echo e(route('checkout.bayar')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <th colspan=""><button type="submit" class="form-control btn btn-primary">Checkout</button></th>
                                </form>
                            </tr>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>

<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/checkout.blade.php ENDPATH**/ ?>