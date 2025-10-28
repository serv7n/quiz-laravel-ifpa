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

        // Carrega professores (vazio no início)
        $turma->load('professores:id,name');

        return ApiResponse::success($turma);
    }

    public function show(string $id)
    {
        $turma = Turma::with('professores:id,name')->find($id);

        if ($turma) {
            return ApiResponse::success(data: $turma);
        }

        return ApiResponse::error('Turma not found');
    }

    public function update(Request $request, string $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error( 'Turma not found');
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
            return ApiResponse::error( 'Turma not found');
        }

        $turma->delete();

        return ApiResponse::success(['id' => $id, 'deleted' => true]);
    }
}
