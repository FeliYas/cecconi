<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\CategoriaAccesorio;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    public function index(Request $request)
    {
        $categorias = CategoriaAccesorio::orderBy('orden', 'asc')->with('accesorios')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = asset('storage/' . $categoria->path);
        }
        
        $categoriaSeleccionada = null;
        if ($request->has('categoria')) {
            $categoriaSeleccionada = CategoriaAccesorio::find($request->categoria);
            $accesorios = Accesorio::where('accesorio_categoria_id', $request->categoria)
                                   ->orderBy('orden', 'asc')
                                   ->get();
        } else {
            $accesorios = Accesorio::orderBy('orden', 'asc')->get();
        }
        
        foreach ($accesorios as $accesorio) {
            $accesorio->path = asset('storage/' . $accesorio->path);
        }
        
        $metadatos = Metadato::where('seccion', 'Accesorios')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }

        $redes = Contacto::select('facebook', 'instagram')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        
        return view('front.accesorios', compact(
            'categorias', 
            'accesorios', 
            'categoriaSeleccionada',
            'metadatos', 
            'logos', 
            'contactos', 
            'whatsapp', 
            'redes'
        ));
    }
    
    public function show($productoId)
    {
        $accesorio = Accesorio::with('categoria')->findOrFail($productoId);
        $accesorio->path = asset('storage/' . $accesorio->path);
        foreach ($accesorio->galeria as $imagen) {
            $imagen->path = asset('storage/' . $imagen->path);
        }
        $categorias = CategoriaAccesorio::orderBy('orden', 'asc')->with('accesorios')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = asset('storage/' . $categoria->path);
        }
        $categoriaSeleccionada = $accesorio->categoria;

        $accesoriosRelacionados = Accesorio::where('accesorio_categoria_id', $categoriaSeleccionada->id)
            ->where('id', '!=', $accesorio->id)
            ->orderBy('orden', 'asc')
            ->get();    
        foreach ($accesoriosRelacionados as $relacionado) {
            $relacionado->path = asset('storage/' . $relacionado->path);
        }

        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }

        $redes = Contacto::select('facebook', 'instagram')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;

        return view('front.accesorio', compact(
            'accesorio',
            'categorias',
            'categoriaSeleccionada',
            'accesoriosRelacionados',
            'logos',
            'contactos',
            'whatsapp',
            'redes'
        ));
    }
}