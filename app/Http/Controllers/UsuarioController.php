<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuarioController
{
    public function cadastro_html(Request $request): View
    {
        return view('cadastro-usuario');
    }

    public function salvar_usuario(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'cpf' => ['required', 'string', 'cpf', 'max:100', 'unique:usuario,cpf'],
            'senha' => ['required', 'string', 'min:6', 'max:72'],
            'tipo' => ['required', 'string', 'max:20'],
        ]);

        $usuario = Usuario::create($validated);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso!',
            'usuario' => $usuario,
        ], 201);
    }

    public function ver_usuario(Request $request)
    {
        $usuario = Usuario::find($request->id);
        if ($usuario) {
            return response()->json(['usuario' => $usuario]);
        } else {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }

    public function todo_usuarios(Request $request)
    {
        $usuarios = Usuario::all();

        return response()->json(['usuarios' => $usuarios]);
    }

    public function usuario_simples(Request $request)
    {
        $usuarios = Usuario::select('cfp')->get();

        return response()->json(['usuarios' => $usuarios]);
    }

    public function alterar_usuario(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $usuario = Usuario::find($request->input('id'));

        if (! $usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $validated = $request->validate([
            'nome_usuario' => ['required', 'string', 'max:100'],
            'cpf' => [
                'required',
                'string',
                'cpf',
                'max:100',
                'unique:usuario,cpf,'.$usuario->getKey().',id',
            ],
            'senha' => ['required', 'string', 'min:6', 'max:72'],
            'tipo' => ['required', 'string', 'max:20'],
        ], [
            'cpf.unique' => 'Este CPF já está cadastrado para outro usuário.',
        ]);

        $usuario->update($validated);

        return response()->json([
            'message' => 'Usuário atualizado com sucesso!',
            'usuario' => $usuario,
        ], 200);
    }

    public function deletar_usuario(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        try {
            $usuario = Usuario::find($request->input('id'));
            $usuario->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    }



}
