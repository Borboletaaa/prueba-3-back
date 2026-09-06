<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos - Tech Solutions</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .encabezado {
            background-color: #1f2937;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .encabezado h1 {
            margin: 0;
        }

        .usuario {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contenedor {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #2563eb;
            color: white;
        }

        .vacio {
            text-align: center;
            color: #666;
            padding: 20px;
        }

        button {
            padding: 8px 14px;
            background-color: #dc2626;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="encabezado">

    <h1>Tech Solutions</h1>

    <div class="usuario">

        <span>
            Bienvenido, <?php echo e(auth()->user()->name); ?>

        </span>

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit">
                Cerrar sesión
            </button>
        </form>

    </div>

</div>

<div class="contenedor">

    <h2>Gestión de Proyectos</h2>

    <?php if(session('success')): ?>
        <p><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <?php if($proyectos->count() > 0): ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th>Creado por</th>
                </tr>
            </thead>

            <tbody>

                <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($proyecto->id); ?></td>
                        <td><?php echo e($proyecto->nombre); ?></td>
                        <td><?php echo e($proyecto->fecha_inicio->format('d-m-Y')); ?></td>
                        <td><?php echo e($proyecto->estado); ?></td>
                        <td><?php echo e($proyecto->responsable); ?></td>
                        <td>$<?php echo e(number_format($proyecto->monto, 0, ',', '.')); ?></td>
                        <td><?php echo e($proyecto->creador->name); ?></td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    <?php else: ?>

        <div class="vacio">
            No existen proyectos registrados.
        </div>

    <?php endif; ?>

</div>

</body>
</html><?php /**PATH C:\laragon\www\TechSolutionsU2\resources\views/proyectos/index.blade.php ENDPATH**/ ?>