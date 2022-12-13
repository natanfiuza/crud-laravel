<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.show', compact('categorias'));
    }
    public function create()
    {

        return view('categorias.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',

        ]);

        $categoria = new Categoria();
        $categoria->name = $request->name;


        $categoria->save();
        //toastr()->success('Cadastrado com sucesso!');

        return redirect()->route('categorias.list')->with('success', 'Categoria criada corretamente');
    }


    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);



        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->name;

        $categoria->save();


        return redirect()->route('categorias.list')
            ->with('success', 'Categoria alterada com sucesso!');
    }
}
