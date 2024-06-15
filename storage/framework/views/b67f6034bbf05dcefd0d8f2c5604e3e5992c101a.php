<?php $__env->startSection('title','Вход'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5 text-center">
<h2>Вход</h2>
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

<form method="POST" action="<?php echo e(route('user.login')); ?>">
  <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="exampleInputLogin" class="form-label">Логин</label>
        <input type="login" name="login" class="form-control" id="exampleInputLogin" aria-describedby="LoginHelp" required>
      </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Пароль</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\openserver\domains\de\resources\views/auth/login.blade.php ENDPATH**/ ?>