<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\CategoriaAccesorio;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccesorioProductoController extends Controller
{
    public function index()
    {
        $productos = Accesorio::orderBy('orden', 'asc')->with('categoria','galeria')->get();
        foreach ($productos as $producto) {
            $producto->path = Storage::url($producto->path);
            foreach ($producto->galeria as $imagen) {
                $imagen->path = Storage::url($imagen->path);
            }
        }
        $categorias = CategoriaAccesorio::orderBy('orden', 'asc')->get();
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/ProductosAccesorios', [
            'productos' => $productos,
            'categorias' => $categorias,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'accesorio_categoria_id' => 'required|exists:accesorios_categorias,id',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath = $file->store('images');
        }

        Accesorio::create(array_filter([
            'orden' => $request->orden,
            'path' => $imagePath, 
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion ? $request->descripcion : null,
            'accesorio_categoria_id' => $request->accesorio_categoria_id,
        ]));

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('accesoriosproductos.dashboard')->with('message', 'Accesorio creado exitosamente');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'accesorio_categoria_id' => 'required|exists:accesorios_categorias,id',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $producto = Accesorio::find($id);

        $imagePath = $producto->path;
        if ($request->hasFile('path')) {
            $ruta = $producto->path;
            $file = $request->file('path');
            if ($ruta && Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $imagePath = $file->store('images');
        }

        $producto->update(array_filter([
            'orden' => $request->orden ?? $producto->orden,
            'path' => $imagePath,
            'titulo' => $request->titulo ?? $producto->titulo,
            'descripcion' => $request->descripcion ?? $producto->descripcion,
            'accesorio_categoria_id' => $request->accesorio_categoria_id ?? $producto->accesorio_categoria_id,
        ]));
        $producto->save();

        return redirect()->route('accesoriosproductos.dashboard')->with('message', 'Accesorio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $producto = Accesorio::findOrFail($id);
        if ($producto->path) {
            if (Storage::exists($producto->path)) {
                Storage::delete($producto->path);
            }
        }
        $producto->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('accesoriosproductos.dashboard')->with('message', 'Accesorio eliminado exitosamente');
    }
    public function toggleDestacado(Request $request)
    {
        $producto = Accesorio::findOrFail($request->id);
        $producto->destacado = $request->destacado ? 1 : 0;
        $producto->save();

        if ($producto->destacado == 1) {
            return redirect()->route('accesoriosproductos.dashboard')->with('message', 'Producto destacado exitosamente');
        } else {
            return redirect()->route('accesoriosproductos.dashboard')->with('message', 'Producto quitado de destacado exitosamente');
        }
    }
}
