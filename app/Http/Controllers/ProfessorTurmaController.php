<?php

namespace App\Http\Controllers;

use App\Models\ProfessorTurma;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ProfessorTurmaController extends Controller
{
    public function index()
    {
        return ApiResponse::success(data: ProfessorTurma::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'professor_id' => 'required|exists:professor,id',
            'turma_id' => 'required|exists:turma,id',
        ]);

        $professorTurma = ProfessorTurma::create($request->all());

        return ApiResponse::success($professorTurma);
    }

    public function show(string $professor_id, string $turma_id)
    {
        $professorTurma = ProfessorTurma::where('professor_id', $professor_id)
            ->where('turma_id', $turma_id)
            ->first();

        if ($professorTurma) {
            return ApiResponse::success($professorTurma);
        } else {
            return ApiResponse::error('registro not found');
        }
    }

    public function update(Request $request, string $professor_id, string $turma_id)
    {
        $professorTurma = ProfessorTurma::where('professor_id', $professor_id)
            ->where('turma_id', $turma_id)
            ->first();

        if (!$professorTurma) {
            return ApiResponse::error('registro not found');
        }

        $request->validate([
            'professor_id' => 'required|exists:professor,id',
            'turma_id' => 'required|exists:turma,id',
        ]);

        $professorTurma->update($request->all());

        return ApiResponse::success($professorTurma);
    }

    public function destroy(string $professor_id, string $turma_id)
    {
        $professorTurma = ProfessorTurma::where('professor_id', $professor_id)
            ->where('turma_id', $turma_id)
            ->first();

        if (!$professorTurma) {
            return ApiResponse::error('registro not found');
        }

        $professorTurma->delete();

        return ApiResponse::success($professorTurma);
    }
}
