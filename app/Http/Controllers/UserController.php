<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usuarios.show', compact('users'));
    }
    public function create()
    {
        $typeusers = TypeUser::all();
        return view('usuarios.index',compact('typeusers'));
    }

    public function store(Request $request)
    {
        $mensagens = [
            'name.required' => 'Nome é Obrigatório',
            'required' => ':Attribute é obrigatório!',
            'typeuser_id.required' => 'Tipo da Empresa é obrigatório!',
            'email.email' => 'Digite um email válido!',
            'confirmed' => 'As senhas não coincidem!',
            'password_confirmation.required' => 'Confirmação da Senha é obrigatória!',
            'password.min' => 'A senha deve conter mais do que 6 caracteres ',
            'email.unique' => 'O email já está sendo usado '
        ];

        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users|max:100',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'typeuser_id' => 'required',
        ], $mensagens);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
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
