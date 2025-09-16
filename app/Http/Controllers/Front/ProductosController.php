<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        foreach ($categorias as $categoria) {
            $categoria->path = asset('storage/' . $categoria->path);
        }
        $metadatos = Metadato::where('seccion', 'productos')->first();
        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }

        $redes = Contacto::select('facebook', 'instagram')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;
        return view('front.categorias', compact('categorias', 'metadatos', 'logos', 'contactos', 'whatsapp', 'redes'));
    }
    public function show($categoriaId, $productoId = null)
    {
        $categoria = Categoria::findOrFail($categoriaId);
        $categorias = Categoria::orderBy('orden', 'asc')->with('productos')->get();
        foreach ($categorias as $cat) {
            $cat->path = asset('storage/' . $cat->path);
        }

        $productos = Producto::where('categoria_id', $categoriaId)->orderBy('orden', 'asc')->get();
        foreach ($productos as $prod) {
            $prod->path = asset('storage/' . $prod->path);
        }

        $producto = null;
        if ($productoId) {
            $producto = Producto::findOrFail($productoId);
            $producto->path = asset('storage/' . $producto->path);
        } else {
            $producto = $productos->first();
        }

        $logos = Logo::whereIn('seccion', ['home', 'navbar', 'footer'])->get();
        foreach ($logos as $logo) {
            $logo->path = asset('storage/' . $logo->path);
        }

        $redes = Contacto::select('facebook', 'instagram')->first();
        $contactos = Contacto::select('direccion', 'email', 'telefono', 'whatsapp')->get();
        $whatsapp = Contacto::select('whatsapp')->first()->whatsapp;

        return view('front.producto', compact(
            'categoria', 'categorias', 'productos', 'logos', 'contactos', 'whatsapp', 'redes', 'producto'
        ));
    }
}