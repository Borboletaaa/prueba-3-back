<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Listar todos los proyectos.
     */
    public function index(): JsonResponse
    {
        $proyectos = Proyecto::all();

        return response()->json($proyectos, 200);
    }

    /**
     * Crear un nuevo proyecto.
     */
    public function store(Request $request): JsonResponse
    {
        $datosValidados = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto = Proyecto::create($datosValidados);

        return response()->json($proyecto, 201);
    }

    /**
     * Mostrar un proyecto específico.
     */
    public function show(int $id): JsonResponse
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        return response()->json($proyecto, 200);
    }

    /**
     * Actualizar un proyecto.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        $datosValidados = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto->update($datosValidados);

        return response()->json($proyecto->fresh(), 201);
    }

    /**
     * Eliminar un proyecto.
     */
    public function destroy(int $id): JsonResponse
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado'
            ], 404);
        }

        $proyecto->delete();

        return response()->json(null, 204);
    }
}