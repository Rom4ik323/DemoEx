

<?php $__env->startSection('title','Заказы'); ?>
<?php $__env->startSection('content'); ?>

<h1 class="text-center">Ваши заказы </h1>

<div class="d-flex justify-content-center">
  <img src="/img/6.jpg" style="width: 250; height: 250px;" alt="">
</div>

<div class="container">
    
    <a href="/ticket/create">Создать заказ</a>

    
    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul class="list-group m-4">
            <li class="list-group-item">Номер заказа: <?php echo e($ticket->id); ?></li>
            <li class="list-group-item">Товар:        <?php echo e($ticket->product); ?></li>
            <li class="list-group-item">Количество:   <?php echo e($ticket->qty); ?></li>
            <li class="list-group-item">Статус:       <?php echo e($ticket->status); ?></li>
        </ul>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\openserver\domains\de\resources\views/tickets/tickets.blade.php ENDPATH**/ ?>