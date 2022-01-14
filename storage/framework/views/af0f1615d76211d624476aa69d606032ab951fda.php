<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col" class="col-md-1">Jumlah</th>
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
                        In Cart
                    <?php else: ?>
                        <form wire:submit.prevent="addToCart(<?php echo e($produk->id); ?>)" method="post">
                            <?php echo csrf_field(); ?>
                            <input wire:model="quantity.<?php echo e($produk->id); ?>" type="number" class="form-control-sm">
                            <button type="submit" class="mt-3 btn btn-outline-primary btn-sm">Add to cart</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/livewire/produk-table.blade.php ENDPATH**/ ?>