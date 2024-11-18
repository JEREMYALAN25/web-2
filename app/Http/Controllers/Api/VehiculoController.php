<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return response()->json(Vehiculo::all(), 200);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'tipo_de_vehiculo' => 'required|string|max:255',
        'categoria' => 'required|string|max:255',
    ]);

    $vehiculo = Vehiculo::create($request->all());

    return response()->json($vehiculo, 201);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $vehiculo = Vehiculo::find($id);

    if (!$vehiculo) {
        return response()->json(['message' => 'Vehículo no encontrado'], 404);
    }

    return response()->json($vehiculo, 200);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
    
        if (!$vehiculo) {
            return response()->json(['message' => 'Vehículo no encontrado'], 404);
        }
    
        $request->validate([
            'tipo_de_vehiculo' => 'sometimes|required|string|max:255',
            'categoria' => 'sometimes|required|string|max:255',
        ]);
    
        $vehiculo->update($request->all());
    
        return response()->json($vehiculo, 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $vehiculo = Vehiculo::find($id);

    if (!$vehiculo) {
        return response()->json(['message' => 'Vehículo no encontrado'], 404);
    }

    $vehiculo->delete();

    return response()->json(['message' => 'Vehículo eliminado'], 200);
}

}
