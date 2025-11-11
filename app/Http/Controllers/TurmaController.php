<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with('professores')->get(['id', 'name']);
        return ApiResponse::success(data: $turmas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64',
        ]);

        $turma = Turma::create($request->only('name'));
        $turma->load('professores:id,name');

        return ApiResponse::success($turma);
    }

    public function show(string $id)
    {
        $turma = Turma::with('professores:id,user')->find($id);

        if ($turma) {
            return ApiResponse::success(data: $turma);
        }

        return ApiResponse::error('Turma not found');
    }

    public function update(Request $request, string $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error('Turma not found');
        }

        $request->validate([
            'name' => 'required|string|max:64',
        ]);

        $turma->update($request->only('name'));
        $turma->load('professores:id,name');

        return ApiResponse::success($turma);
    }

    public function destroy(string $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error('Turma not found');
        }

        $turma->delete();

        return ApiResponse::success(['id' => $id, 'deleted' => true]);
    }

    /**
     * Atualiza o campo "comecou" da turma via rota:
     * GET /api/turma/{id}/comecou/{value}
     */
    public function alterarComecou($id, $value)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error('Turma not found', 404);
        }

        if (!in_array($value, ['0', '1', 0, 1], true)) {
            return ApiResponse::error('Invalid value, must be 0 or 1', 400);
        }

        $turma->comecou = (int) $value;
        $turma->save();

        return ApiResponse::success([
            'id' => $turma->id,
            'name' => $turma->name,
            'comecou' => (bool) $turma->comecou,
            'message' => $turma->comecou ? 'Turma iniciada' : 'Turma parada'
        ]);
    }
    public function listarQuestoes($id)
    {
        try {
            // Busca a turma e carrega as questões associadas
            $turma = Turma::with('questoes')->find($id);

            if (!$turma) {
                return ApiResponse::error("Turma não encontrada");
            }

            return ApiResponse::success($turma->questoes);
        } catch (\Exception $e) {
            return ApiResponse::error("Erro ao listar questões: ");
        }
    }
}
