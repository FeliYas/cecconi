<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderby('orden', 'asc')->get();
        foreach ($sliders as $slider) {    
            $slider->path = Storage::url($slider->path);
        }
        $logo = Logo::where('seccion', 'dashboard')->first();
        $logo->path = Storage::url($logo->path); 
        return inertia('Admin/Slider', [
            'sliders' => $sliders,
            'logo' => $logo
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,webp,webm|max:100000',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        $filePath = null;
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filePath=$file->store('images');
        } 

        Slider::create([
            'orden' => $request->orden,
            'path' => $filePath,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('slider.dashboard')->with('message', 'Slider creado exitosamente');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'orden' => 'required|string|max:255',
            'path' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,webp|max:100000',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->witherrors($validator->messages()->first());
        }

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('path')) {
            $ruta= $slider->path;
            $file = $request->file('path');
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            
            $imagePath=$file->store('images');
            
        }

        $slider->orden = $request->input('orden');
        $slider->titulo = $request->input('titulo');
        $slider->descripcion = $request->input('descripcion');
        $slider->path = $imagePath ?? $slider->path;

        $slider->save();

        return redirect()->route('slider.dashboard')->with('message', 'Slider editado exitosamente');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->path) {
            if (Storage::exists($slider->path)) {
                Storage::delete($slider->path);
            }
        }
        $slider->delete();

        return redirect()->route('slider.dashboard')->with('message', 'Slider eliminado exitosamente');
    }
}
