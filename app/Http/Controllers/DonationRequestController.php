<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donacion;
use App\Models\TipoElectrodomestico;

class DonationRequestController extends Controller
{
    public function create($type)
    {
        $tiposElectrodomesticos = TipoElectrodomestico::all();

        if ($type === 'donar') {
            return view('donar_disp', compact('tiposElectrodomesticos')); // Vista para donar dispositivos
        } elseif ($type === 'solicitar') {
            return view('solicitar_donativo', compact('tiposElectrodomesticos')); // Vista para solicitar donativo
        }

        abort(404); // Retorna un error 404 si el tipo no es válido
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
            'tipo_dispositivo' => 'required|string|in:computadora,tableta,telefono,accesorios',
            'descripcion' => 'required|string|max:500'
        ]);

        Donacion::create([
            'id_usuario' => auth()->id(), // O usa el ID adecuado
            'id_tipo_electrodomestico' => $request->id_tipo_electrodomestico, // ✅ Guardar la referencia correcta
            'id_estado_dispositivo' => 1, // Asigna un estado válido
            'descripcion' => $request->descripcion,
            'fecha' => now(),
            'telefono' => $request->telefono,
            'total_dispositivos' => 1, // O usa el número correcto
            'activo' => true,
        ]);
        
        


        return redirect()->back()
            ->with('success', 'Tu solicitud ha sido enviada correctamente.');
    }

    /**
     * Muestra el formulario para donar dispositivos
     */
    public function showForm()
    {
        $tiposElectrodomesticos = TipoElectrodomestico::all();
        return view('donar_disp', compact('tiposElectrodomesticos'));
    }
}
