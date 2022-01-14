<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>


        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <p class="h2">Karyawan</p>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Kontrak Habis</th>
                                <th scope="col">Shift</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $karyawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($karyawan->nama); ?></td>
                                <td><?php echo e($karyawan->kontak); ?></td>
                                <td><?php echo e($karyawan->masa_kontrak); ?></td>
                                <?php if($karyawan->shift_id == 1): ?>
                                <td>Pagi</td>
                                <?php elseif($karyawan->shift_id == 2): ?>
                                    <td>Siang</td>
                                <?php elseif($karyawan->shift_id == 3): ?>
                                    <td>Malam</td>
                                <?php endif; ?>
                                <td><a href="<?php echo e(url('/editKaryawan/'.$karyawan->id)); ?>" >Edit</a>  | <a href="<?php echo e(url('/hapusKaryawan/'.$karyawan->id)); ?>" >Hapus</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <p class="h2">Produk</p>
                        <table class="mt-4 table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Tanggal Produksi</th>
                                <th scope="col">Kadaluarsa</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($produk->id); ?></td>
                                    <td><?php echo e($produk->nama); ?></td>
                                    <td><?php echo e($produk->kategori); ?></td>
                                    <td><?php echo e($produk->pabrikan); ?></td>
                                    <td><?php echo e($produk->tanggal_produksi); ?></td>
                                    <td><?php echo e($produk->tanggal_kedaluwarsa); ?></td>
                                    <td><?php echo e($produk->harga); ?></td>
                                    <td><?php echo e($produk->jumlah_stok); ?></td>
                                    <td><a href="<?php echo e(url('/editObat/'.$produk->id)); ?>" >Edit</a>  | <a href="<?php echo e(url('/hapusObat/'.$produk->id)); ?>" >Hapus</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col-md-1">Id</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->id); ?></td>
                                    <td><?php echo e($data->tanggal_order); ?></td>
                                    <td><?php echo e($data->metode_pembayaran); ?></td>
                                    <td><?php echo e($data->nama); ?></td>
                                    <td><?php echo e($data->jumlah); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($transaksi->onEachSide(5)->links()); ?>

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
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/dashboard.blade.php ENDPATH**/ ?>