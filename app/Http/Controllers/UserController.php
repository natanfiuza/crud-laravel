<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TypeUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usuarios.show', compact('users'));
    }
    public function create()
    {

        return view('usuarios.index');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->typeuser_id = $request->typeuser_id;


        $user->save();


        return redirect()->route('usuarios.list')->with('success', 'Usuário criado corretamente');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $typeusers = TypeUser::all();


        return view('usuarios.edit', compact('user', 'typeusers'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->typeuser_id = $request->typeuser_id;

        $user->save();



        return redirect()->route('usuarios.list')
            ->with('success', 'Usuário alterado com sucesso!');
    }
}
