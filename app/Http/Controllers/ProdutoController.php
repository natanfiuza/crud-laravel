<?php

namespace App\Http\Controllers;


use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.show', compact('produtos'));
    }
    public function create()
    {

        return view('produtos.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',

        ]);

        $produto = new Produto();
        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->marca_id = $request->marca_id;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();
        toastr()->success('Cadastrado com sucesso!');

        return redirect()->route('produtos.show')->with('success', 'Produto criado corretamente');
    }


    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->marca_id = $request->marca_id;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();

        toastr()->success('Editado com sucesso!');

        return redirect()->route('produtos.list')
        ->with('success', 'Produto cadastrado com sucesso!');
    }
}
