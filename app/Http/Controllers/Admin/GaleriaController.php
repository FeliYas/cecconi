<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaAccesorio;
use App\Models\GaleriaProyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriaController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ordenes' => 'required|array',
            'ordenes.*' => 'required|string|max:255',
            'entity_id' => 'required|integer',
            'entity_type' => 'required|string|max:255',
            'imagenes' => 'required|array',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->messages()->first());
        }

        if ($request->entity_type === 'producto') {
            foreach ($request->imagenes as $index => $imagen) {
                $imagePath = null;
                if ($imagen) {
                    $file = $request->file('imagenes')[$index];
                    $imagePath = $file->store('images');
                }
                Galeria::create([
                    'orden' => $request->ordenes[$index],
                    'producto_id' => $request->entity_id,
                    'path' => $imagePath,
                ]);
            }
            
        return redirect()->route('productos.dashboard')->with('success', 'Galería actualizada correctamente.');
        }
        if ($request->entity_type === 'accesorio') {
            foreach ($request->imagenes as $index => $imagen) {
                $imagePath = null;
                if ($imagen) {
                    $file = $request->file('imagenes')[$index];
                    $imagePath = $file->store('images');
                }
                GaleriaAccesorio::create([
                    'orden' => $request->ordenes[$index],
                    'accesorio_id' => $request->entity_id,
                    'path' => $imagePath,
                ]);
            }
            return redirect()->route('accesoriosproductos.dashboard')->with('success', 'Galería actualizada correctamente.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $entityType = $request->input('entity_type');
        if ($entityType === 'producto') {
            $imagen = Galeria::findOrFail($id);
            if ($imagen->path && Storage::exists($imagen->path)) {
                Storage::delete($imagen->path);
            }
            Galeria::destroy($id);
            return redirect()->route('productos.dashboard')->with('success', 'Imagen eliminada correctamente.');
        } else if ($entityType === 'accesorio') {
            $imagen = GaleriaAccesorio::findOrFail($id);
            if ($imagen->path && Storage::exists($imagen->path)) {
                Storage::delete($imagen->path);
            }
            GaleriaAccesorio::destroy($id);
            return redirect()->route('accesoriosproductos.dashboard')->with('success', 'Imagen eliminada correctamente.');
        } else {
            return back()->withErrors('Tipo de entidad no válido.');
        }
    }
}
