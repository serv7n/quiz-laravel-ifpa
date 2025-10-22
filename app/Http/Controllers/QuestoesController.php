<?php

namespace App\Http\Controllers;

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
}
