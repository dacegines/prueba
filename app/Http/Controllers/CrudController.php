<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $cruds = Crud::all();
        return view('crud.index', compact('cruds'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        Crud::create($request->all());

        return redirect()->route('crud.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    public function update(Request $request, Crud $crud)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $crud->update($request->all());

        return redirect()->route('crud.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy(Crud $crud)
    {
        $crud->delete();

        return redirect()->route('crud.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
