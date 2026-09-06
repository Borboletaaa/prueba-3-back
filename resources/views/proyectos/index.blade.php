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
            Bienvenido, {{ auth()->user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Cerrar sesión
            </button>
        </form>

    </div>

</div>

<div class="contenedor">

    <h2>Gestión de Proyectos</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($proyectos->count() > 0)

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

                @foreach ($proyectos as $proyecto)

                    <tr>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->fecha_inicio->format('d-m-Y') }}</td>
                        <td>{{ $proyecto->estado }}</td>
                        <td>{{ $proyecto->responsable }}</td>
                        <td>${{ number_format($proyecto->monto, 0, ',', '.') }}</td>
                        <td>{{ $proyecto->creador->name }}</td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="vacio">
            No existen proyectos registrados.
        </div>

    @endif

</div>

</body>
</html>