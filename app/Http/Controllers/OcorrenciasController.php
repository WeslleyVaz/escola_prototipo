<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OcorrenciasController;

{
    public function index(Request $request)
    {
        $ocorrencias = Ocorrencia::all();
        return response()->json(['ocorrencias' => $ocorrencias], 200);
    }

    public function ocorrencia(Request $request)
    { $request->validate([
    'rm_aluno'=>('required', 'string', 'rm_aluno', 'max:5');
    'descricao'=>('required', 'string', 'descricao', 'max:200');
    'medidas_tomadas'=>('required', 'string', 'medidas_tomadas', 'max:200');
        ]);

    $ocorrencia = Ocorrencia::create($request->all());

    return response()->json([
    'mensagem' => 'Ocorrencia registrada com sucesso!',
    'ocorrencia' => $ocorrencia
        ], 201);

        
    public function alterar_ocorrencia(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);

        $ocorrencia = Ocorrencia::find($request->id);

        if (!$ocorrencia) {
            return response()->json(['message' => 'Ocorrencia nao encontrada'], 404);
        }

        $validated = $request->validate([
            'rm_aluno' => ['required', 'string', 'max:5'],
            'descricao' => ['required', 'string', 'max:200'],
            'medidas_tomadas' => ['required', 'string', 'max:200'],
        ]);

        $ocorrencia->update($validated);

        return response()->json([
            'message' => 'Ocorrencia atualizada com sucesso!',
            'ocorrencia' => $ocorrencia,
        ], 200);
    }

    public function deletar_ocorrencia(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'integer']
        ]);

        $ocorrencia = Ocorrencia::find($request->id);

        try{
            
            if (!$ocorrencia) {
                return response()->json(['message' => 'Ocorrencia nao encontrada'], 404);
            }

            $ocorrencia->delete();

            return response()->json(['message' => 'Ocorrencia deletada com sucesso!'], 200);
        } catch (\Exception $th) {
            return response()->json(['message' => 'Erro ao deletar a ocorrencia: ' . $th->getMessage()], 500);
        }
    }
}
