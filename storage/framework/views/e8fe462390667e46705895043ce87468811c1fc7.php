<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Transaksi')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex p-2 flex-row-reverse px-2 mb-4 py-2 sm:rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                        <form method="post" action="<?php echo e(route('cart.destroy')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="form-control mt-2 ml-2 btn btn-danger btn-sm">Remove Cart</button>
                        </form>
                        <a href="<?php echo e(route('checkout')); ?>"><button type="submit" class="form-control mt-2 btn btn-info btn-sm">Show Cart & Checkout</button></a>
                        <p class="mt-3 mx-2">Cart (<?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::content()->count()); ?> Barang)</p>
                        <i class="material-icons mt-3">add_shopping_cart</i>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="">Nama</th>
                                <th scope="col" class="">Kategori</th>
                                <th scope="col" class="">Harga</th>
                                <th scope="col" class="col-sm-1">Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($produk->nama); ?></td>
                                    <td><?php echo e($produk->kategori); ?></td>
                                    <td>Rp <?php echo e(number_format($produk->harga)); ?></td>
                                    <td>
                                        <?php if($cart->where('id', $produk->id)->count()): ?>
                                            <form method="post" action="<?php echo e(route('cart.removeitem')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="produk_id" value="<?php echo e($produk->id); ?>">
                                                <button type="submit" class="form-control mt-1 btn btn-outline-warning btn-sm">Remove Item</button>
                                            </form>
                                            <form method="post" action="<?php echo e(route('cart.editquantity')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="produk_id" value="<?php echo e($produk->id); ?>">
                                                <?php
                                                $cartArray = $cart->toArray();
                                                $itemqty = 0;
                                                foreach ($cartArray as $data) {
                                                    if ($data['id'] == $produk->id) {
                                                        $itemqty = $data['qty'];
                                                    }
                                                }
                                                ?>
                                                <input type="number" class="form-control-sm mt-1" name="quantity" value="<?php echo e($itemqty); ?>">
                                                <button type="submit" class="form-control mt-1 btn btn-outline-secondary btn-sm">Edit Quantity</button>
                                            </form>
                                        <?php else: ?>
                                            <form method="post" action="<?php echo e(route('cart.store')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="nama_produk" value="<?php echo e($produk->nama); ?>">
                                                <input type="hidden" name="produk_id" value="<?php echo e($produk->id); ?>">
                                                <input type="number" name="quantity" value="<?php echo e(old('quantity')); ?>" class="form-control-sm">
                                                <button type="submit" class="form-control mt-3 btn btn-outline-primary btn-sm">Add to cart</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views//transaksi.blade.php ENDPATH**/ ?>