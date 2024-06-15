<?php $__env->startSection('title','Панель администратора'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-3">
  <?php if($errors->any()): ?>
  <div class="alert alert-danger">
      <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
  </div>
<?php endif; ?>

<h1 class="text-center">Управление заказами</h1>
<div class="row">

        <div class="row">
        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul class="list-group m-4" style="width: 20%">
            <li class="list-group-item">Номер заказа: <?php echo e($ticket->id); ?></li>
            <li class="list-group-item">Имя:  <?php echo e($ticket->name); ?></li>
            <li class="list-group-item">Email:  <?php echo e($ticket->email); ?></li>
            <li class="list-group-item">Товар:  <?php echo e($ticket->product); ?></li>
            <li class="list-group-item">Количество:  <?php echo e($ticket->qty); ?></li>
            <li class="list-group-item">Адрес:  <?php echo e($ticket->address); ?></li>
            <li class="list-group-item"><form method="POST" action="<?php echo e(route('ticket.update', $ticket)); ?>">
                <?php echo csrf_field(); ?>
                <select name="status" class="form-select" aria-label="Default select example">
                    <option selected><?php echo e($ticket->status); ?></option>
                    <option value="Новая">Новая</option>
                    <option value="в процессе">в процессе</option>
                    <option value="выполнено ">выполнено</option>
                    <option value="отменено ">отменено</option>
                  </select>
                  <button class="btn btn-success" type="submit">Изменить</button>
            </form></li>
        </ul>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\openserver\domains\de\resources\views/admin/index.blade.php ENDPATH**/ ?>