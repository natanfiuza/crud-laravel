<?php

namespace App\Http\Controllers;


use App\Models\Marca;
use App\Models\Produto;
use App\Models\Categoria;
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
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('produtos.index',compact('categorias','marcas'));
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


        return redirect()->route('produtos.list')->with('success', 'Produto criado corretamente');
    }


    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('produtos.edit', compact('produto','categorias','marcas') );
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->marca_id = $request->marca_id;
        $produto->categoria_id = $request->categoria_id;

        $produto->save();



        return redirect()->route('produtos.list')
        ->with('success', 'Produto alterado com sucesso!');
    }
}
