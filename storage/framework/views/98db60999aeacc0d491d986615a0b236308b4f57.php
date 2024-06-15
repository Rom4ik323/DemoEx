<?php $__env->startSection('title','Регистрация'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5 text-center">
<h2>Регистрация</h2>
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


<form action="<?php echo e(route('user.store')); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <div class="form-floating mb-3">
    <input type="name" class="form-control" name="name" id="floatingInput" placeholder="name" required>
    <label for="floatingInput">ФИО</label>
  </div>
  <div class="form-floating mb-3">
    <input type="phone" class="form-control" data-phone-pattern name="number" id="floatingInput" placeholder="number" required>
    <label for="floatingInput">Телефон</label>
  </div>
  <div class="form-floating mb-3">
    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
    <label for="floatingInput">Почта</label>
  </div>
  <div class="form-floating mb-3">
    <input type="login" class="form-control" name="login" id="floatingInput" placeholder="login" required>
    <label for="floatingInput">Логин</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Пароль</label>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\openserver\domains\de\resources\views/auth/register.blade.php ENDPATH**/ ?>