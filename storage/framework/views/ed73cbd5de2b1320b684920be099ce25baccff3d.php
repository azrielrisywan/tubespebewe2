<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Produk')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <form method="post" action="<?php echo e(route('tambah.produk')); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="Nama">Nama Produk</label>
                                <input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama Produk" value="<?php echo e(old('nama')); ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Kategori">Kategori</label>
                                <select class="custom-select" id="Kategori" name="kategori">
                                    <option value="Obat">Obat</option>
                                    <option value="Non Obat">Non Obat</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Pabrikan">Pabrikan</label>
                                <input type="text" class="form-control" id="Pabrikan" name="pabrikan" placeholder="Pabrikan" value="<?php echo e(old('pabrikan')); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="TanggalProduksi">Tanggal Produksi</label>
                                <input type="date" class="form-control" id="TanggalProduksi" name="tanggalproduksi" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TanggalKedaluwarsa">Tanggal Kedaluwarsa</label>
                                <input type="date" class="form-control" id="TanggalKedaluwarsa" name="tanggalkedaluwarsa" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="Harga">Harga</label>
                                <input type="number" class="form-control" id="Harga" name="harga" value="<?php echo e(old('harga')); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="JumlahStok">Jumlah Stok</label>
                                <input type="number" class="form-control" id="JumlahStok" name="jumlahstok" value="<?php echo e(old('jumlahstok')); ?>">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </form>
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
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/produk.blade.php ENDPATH**/ ?>