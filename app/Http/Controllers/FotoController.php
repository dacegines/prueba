<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::all();
        return view('fotos.index', compact('fotos'));
    }

    public function create()
    {
        return view('fotos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        // Almacenar la foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public/fotos');
            $url = Storage::url($path);
        }

        Foto::create([
            'nombre' => $request->nombre,
            'ruta' => $url,
        ]);

        return redirect()->route('fotos.index')
            ->with('success', 'Foto subida exitosamente.');
    }

    public function destroy(Foto $foto)
    {
        // Eliminar el archivo físico
        $path = str_replace('/storage', 'public', $foto->ruta);
        Storage::delete($path);

        // Eliminar el registro de la base de datos
        $foto->delete();

        return redirect()->route('fotos.index')
            ->with('success', 'Foto eliminada exitosamente.');
    }
}
