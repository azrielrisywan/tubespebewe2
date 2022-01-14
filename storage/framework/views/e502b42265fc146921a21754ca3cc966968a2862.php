<?php if(Session::has('success')): ?>
    <script type="text/javascript">
        swal({
            title:'Success!',
            text:"<?php echo e(Session::get('success')); ?>",
            timer:5000,
            type:'success'
        }).then((value) => {
            location.reload();
        }).catch(swal.noop);
    </script>
<?php endif; ?>
<?php /**PATH C:\XAMPP\htdocs\tubespebewe2\resources\views/sweet-alert.blade.php ENDPATH**/ ?>