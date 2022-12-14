<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use Illuminate\Http\Request;

class TypeUserController extends Controller
{
    public function index()
    {
        $typeusers = TypeUser::all();
        return view('typeusers.show', compact('typeusers'));
    }
    public function create()
    {

        return view('typeusers.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',

        ]);

        $typeuser = new TypeUser();
        $typeuser->name = $request->name;

        $typeuser->save();

        return redirect()->route('typeusers.list')->with('success', 'Tipo de usuário criado corretamente');
    }


    public function edit($id)
    {
        $typeuser = TypeUser::findOrFail($id);



        return view('typeusers.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $typeuser = TypeUser::findOrFail($id);
        $typeuser->name = $request->name;

        $typeuser->save();

        return redirect()->route('typeusers.list')
            ->with('success', 'Tipo de usuário alterado com sucesso!');
    }
}
