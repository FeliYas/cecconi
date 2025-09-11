<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Logo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('orden', 'asc')->with('categoria','galeria')->get();
        foreach ($productos as $producto) {
            $producto->path = Storage::url($producto->path);
            foreach ($producto->galeria as $imagen) {
                $imagen->path = Storage::url($imagen->path);
            }
        }
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/Productos', [
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
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        
        $imagePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $imagePath = $file->store('images');
        }

        Producto::create(array_filter([
            'orden' => $request->orden,
            'path' => $imagePath,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion ? $request->descripcion : null,
            'categoria_id' => $request->categoria_id,
        ]));

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('productos.dashboard')->with('message', 'Producto creado exitosamente');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $producto = Producto::find($id);

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
            'categoria_id' => $request->categoria_id ?? $producto->categoria_id,
        ]));
        $producto->save();

        return redirect()->route('productos.dashboard')->with('message', 'Producto actualizado exitosamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->path) {
            if (Storage::exists($producto->path)) {
                Storage::delete($producto->path);
            }
        }
        $producto->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('productos.dashboard')->with('message', 'Producto eliminado exitosamente');
    }
}
