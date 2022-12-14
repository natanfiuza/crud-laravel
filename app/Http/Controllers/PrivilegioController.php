<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\PrivilegioUser;
use Illuminate\Support\Facades\Auth;

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

        $user = new Privilegio();
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
    public function get_user_privileges(Request $request)
    {

        $data = [];
        foreach (PrivilegioUser::where('user_id', $request->user_id)->get() as $privilegio_user) {
            $data[] = ['id' => $privilegio_user->privilegio_id, 'privilegio' => Privilegio::findOrFail($privilegio_user->privilegio_id)];
        }

        return response()->json(['data' => $data, 'qtdItens' => count($data)]);
    }
}
