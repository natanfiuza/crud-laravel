<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use Illuminate\Http\Request;

class PrivilegioController extends Controller
{
    public function index()
    {
        $privilegios = Privilegio::all();
        return view('privilegios.show', compact('privilegios'));
    }
    public function create()
    {

        return view('privilegios.index');
    }

    public function store(Request $request)
    {
        $mensagens = [
            'name.required' => 'Nome é Obrigatório',
            'required' => ':Attribute é obrigatório!',

        ];

        $validator = $request->validate([
            'name' => 'required|string|max:100',

        ], $mensagens);

        $user = new User();
        $user->name = $request->name;

        $user->save();

        return redirect()->route('privilegios.list')->with('success', 'Privilégio criado corretamente');
    }


    public function edit($id)
    {
        $privilegio = Privilegio::findOrFail($id);



        return view('privilegios.edit', compact('privilegio'));
    }

    public function update(Request $request, $id)
    {
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->name = $request->name;

        $privilegio->save();

        return redirect()->route('privilegios.list')
            ->with('success', 'Privilégio alterado com sucesso!');
    }
}
