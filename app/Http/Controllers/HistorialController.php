<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tarea_id' => 'required|integer',
            'usuario_id' => 'required|integer',
            'accion' => 'required|string',
            'fecha' => 'nullable|date'
        ]);

        $historial = Historial::create([
            'tarea_id' => $request->tarea_id,
            'usuario_id' => $request->usuario_id,
            'accion' => $request->accion,
            'fecha' => $request->fecha ?? now()
        ]);

        return response()->json($historial, 201);
    }

    public function index(Request $request)
    {
        // Permite filtrar por tarea_id opcionalmente
        $query = Historial::query();

        if ($request->has('tarea_id')) {
            $query->where('tarea_id', $request->tarea_id);
        }

        return response()->json($query->orderByDesc('fecha')->get());
    }
}

?>