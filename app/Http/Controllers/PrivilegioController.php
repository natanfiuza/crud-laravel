<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::where('uuid', $request->user_id)->firstOrFail();
        $user_id = $user->id;
        $privilegios = Privilegio::all();
        $data = [];
        foreach ($privilegios as $privilegio_user) {
            $data[] = ['id' => $privilegio_user->id, 'privilegio' => Privilegio::findOrFail($privilegio_user->id),'checked' => PrivilegioUser::where('privilegio_id', $privilegio_user->id)->where('user_id', $user_id)->exists() ];
        }

        return response()->json(['data' => $data, 'qtdItens' => count($data)]);
    }
    public function set_user_privileges(Request $request)
    {
        $user = User::where('uuid', $request->user_id)->firstOrFail();
        $user_id = $user->id;
        $privilegios = $request->privileges;
        PrivilegioUser::where('user_id',$user_id)->delete();
        foreach($privilegios as $privilegio_id) {
            $privilegiouser= new PrivilegioUser();
            $privilegiouser->user_id = $user_id;
            $privilegiouser->privilegio_id = $privilegio_id;
            $privilegiouser->save();
        }

        return response()->json(['ok' => true, 'messages' => 'set user privileges']);
    }
}
