<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.show', compact('marcas'));
    }
    public function create()
    {

        return view('marcas.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',

        ]);

        $categoria = new Marca();
        $categoria->name = $request->name;


        $categoria->save();


        return redirect()->route('marcas.list')->with('success', 'Marca criada corretamente');
    }


    public function edit($id)
    {
        $marca = Marca::findOrFail($id);



        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->name = $request->name;

        $marca->save();

        ///  toastr()->success('Editado com sucesso!');

        return redirect()->route('marcas.list')
            ->with('success', 'Marca alterada com sucesso!');
    }
}
