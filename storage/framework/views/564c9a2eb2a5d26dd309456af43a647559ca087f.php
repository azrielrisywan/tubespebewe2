<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Obat')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="Nama">Nama Obat</label>
                                <input type="text" class="form-control" id="Nama" placeholder="Nama Obat" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault03">No. HP</label>
                                <input type="number" class="form-control" id="validationDefault03" placeholder="No. HP" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault04">Masa Kontrak Habis</label>
                                <input type="date" class="form-control" id="validationDefault04" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="shift">Shift</label>
                                <select class="custom-select" id="shift">
                                    <option selected>Choose...</option>
                                    <option value="1">Malam Weekday</option>
                                    <option value="2">Siang Weekday</option>
                                    <option value="3">Malam Weekend</option>
                                    <option value="3">Siang Weekend</option>
                                </select>
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
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/obat.blade.php ENDPATH**/ ?>