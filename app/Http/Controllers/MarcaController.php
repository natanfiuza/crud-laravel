<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $categorias = Marca::all();
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

        $categoria = new Marca();
        $categoria->name = $request->name;


        $categoria->save();
        //toastr()->success('Cadastrado com sucesso!');

        return redirect()->route('categorias.list')->with('success', 'Categoria criada corretamente');
    }


    public function edit($id)
    {
        $categoria = Marca::findOrFail($id);



        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Marca::findOrFail($id);
        $categoria->name = $request->name;

        $categoria->save();

        ///  toastr()->success('Editado com sucesso!');

        return redirect()->route('categorias.list')
            ->with('success', 'Categoria alterada com sucesso!');
    }
}
