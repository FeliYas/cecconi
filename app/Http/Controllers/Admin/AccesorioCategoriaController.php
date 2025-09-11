<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaAccesorio;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccesorioCategoriaController extends Controller
{
    public function index()
    {
        $categorias = CategoriaAccesorio::orderBy('orden', 'asc')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = Storage::url($categoria->path);
        }
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path);
        return inertia('Admin/CategoriasAccesorios', [
            'categorias' => $categorias,
            'logo' => $logo
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->messages()->first());
        }

        CategoriaAccesorio::create(array_filter([
            'orden' => $request->orden,
            'titulo' => $request->titulo,
        ]));

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('accesorioscategorias.dashboard')->with('message', 'Categoria creada exitosamente');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }
        $categoria = CategoriaAccesorio::find($id);

        $categoria->update(array_filter([
            'orden' => $request->orden ?? $categoria->orden,
            'titulo' => $request->titulo ?? $categoria->titulo,
        ]));
        $categoria->save();
        
        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('accesorioscategorias.dashboard')->with('message', 'Categoria actualizada exitosamente');
    }

    public function destroy($id)
    {
        $categoria = CategoriaAccesorio::findOrFail($id);
        $categoria->delete();

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('accesorioscategorias.dashboard')->with('message', 'Categoria eliminada exitosamente');
    } 
    public function toggleDestacado(Request $request)
    {
        $categoria = CategoriaAccesorio::findOrFail($request->id);
        $categoria->destacado = $request->destacado ? 1 : 0;
        $categoria->save();

        if ($categoria->destacado == 1) {
            return redirect()->route('accesorioscategorias.dashboard')->with('message', 'Categoria destacada exitosamente');
        } else {
            return redirect()->route('accesorioscategorias.dashboard')->with('message', 'Categoria quitada de destacado exitosamente');
        }
    }
}
