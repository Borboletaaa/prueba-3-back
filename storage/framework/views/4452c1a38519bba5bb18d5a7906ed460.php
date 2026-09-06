<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tech Solutions</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login {
            text-align: center;
            margin-top: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Registro de Usuario</h1>

    <?php if($errors->any()): ?>
        <div class="error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('register.process')); ?>">

        <?php echo csrf_field(); ?>

        <label for="name">Nombre</label>
        <input
            type="text"
            id="name"
            name="name"
            value="<?php echo e(old('name')); ?>"
            required
        >

        <label for="email">Correo electrónico</label>
        <input
            type="email"
            id="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            required
        >

        <label for="password">Contraseña</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <label for="password_confirmation">Confirmar contraseña</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
        >

        <button type="submit">
            Registrarse
        </button>

    </form>

    <div class="login">
        ¿Ya tienes una cuenta?
        <a href="<?php echo e(route('login')); ?>">Iniciar sesión</a>
    </div>

</div>

</body>
</html><?php /**PATH C:\laragon\www\TechSolutionsU2\resources\views/auth/register.blade.php ENDPATH**/ ?>