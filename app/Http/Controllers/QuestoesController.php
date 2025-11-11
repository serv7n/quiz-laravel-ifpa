<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Questoes;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class QuestoesController extends Controller
{
    public function index()
    {
        return ApiResponse::success(data: Questoes::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'alt1' => 'nullable|string|max:255',
            'alt2' => 'nullable|string|max:255',
            'alt3' => 'nullable|string|max:255',
            'alt4' => 'nullable|string|max:255',
            'altCorreta' => 'required|in:alt1,alt2,alt3,alt4',
            'timing' => 'nullable|integer',
            'turma_id' => 'nullable|exists:turma,id',
        ]);

        $questao = Questoes::create($request->all());

        return ApiResponse::success($questao);
    }

    public function show(string $id)
    {
        $questao = Questoes::find($id);

        if ($questao) {
            return ApiResponse::success($questao);
        } else {
            return ApiResponse::error('questao not found');
        }
    }

    public function update(Request $request, string $id)
    {
        $questao = Questoes::find($id);

        if (!$questao) {
            return ApiResponse::error('questao not found');
        }

        $request->validate([
            'title' => 'sometimes|required|string',
            'alt1' => 'nullable|string|max:255',
            'alt2' => 'nullable|string|max:255',
            'alt3' => 'nullable|string|max:255',
            'alt4' => 'nullable|string|max:255',
            'altCorreta' => 'sometimes|required|in:alt1,alt2,alt3,alt4',
            'timing' => 'nullable|integer',
            'turma_id' => 'nullable|exists:turma,id',
        ]);

        $questao->update($request->all());

        return ApiResponse::success($questao);
    }

    public function destroy(string $id)
    {
        $questao = Questoes::find($id);

        if (!$questao) {
            return ApiResponse::error('questao not found');
        }

        $questao->delete();

        return ApiResponse::success($questao);
    }

    public function porUsuario($id)
    {
        $aluno = Aluno::with('turma')->find($id);

        if (!$aluno || !$aluno->turma) {
            return ApiResponse::error('Usuário ou turma não encontrados');
        }

        $turma = $aluno->turma;
        $questoes = $turma->questoes()->get();

        return ApiResponse::success([
            'comecou' => $turma->comecou, // ✅ indica se as questões começaram
            'questoes' => $questoes,       // ✅ lista de questões da turma
        ]);
    }

    public function destroyAll()
    {
        try {
            $total = Questoes::count();

            if ($total === 0) {
                return ApiResponse::error('Nenhuma questão encontrada para excluir.');
            }

            Questoes::truncate(); // ⚡ apaga todas as linhas de forma eficiente

            return ApiResponse::success([
                'mensagem' => "Todas as {$total} questões foram apagadas com sucesso!"
            ]);
        } catch (\Exception $e) {
            return ApiResponse::error('Erro ao apagar todas as questões: ' . $e->getMessage());
        }
    }

    
}
