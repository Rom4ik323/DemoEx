

<?php $__env->startSection('title','Создание заказа'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5 text-center">
<h2 class="mb-5">Создание заказа</h2>
</div>



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

<form action="<?php echo e(route('ticket.store')); ?>" method="POST">
  <?php echo csrf_field(); ?>

  <select class="mb-3 form-select" name="product" aria-label="Default select example">
    <option selected>Выберите товар</option>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($product->title); ?>"><?php echo e($product->title); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  <div class="form-floating mb-3">
    <input type="number" min="1" class="form-control" name="qty" id="floatingInput" placeholder="Количество" required>
    <label for="floatingInput">Количество</label>
  </div>
  <div class="form-floating mb-3">
    <input type="name" class="form-control" name="address" id="floatingInput" placeholder="адрес" required>
    <label for="floatingInput">Ваш адрес</label>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Отправить</button>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\openserver\domains\de\resources\views/tickets/create.blade.php ENDPATH**/ ?>