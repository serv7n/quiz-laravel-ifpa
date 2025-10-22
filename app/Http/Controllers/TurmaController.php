<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        return ApiResponse::success(data: Turma::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64',
        ]);

        $turma = Turma::create($request->all());

        return ApiResponse::success($turma);
    }

    public function show(string $id)
    {
        $turma = Turma::find($id);

        if ($turma) {
            return ApiResponse::success($turma);
        } else {
            return ApiResponse::error('turma not found');
        }
    }

    public function update(Request $request, string $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error('turma not found');
        }

        $request->validate([
            'name' => 'required|string|max:64',
        ]);

        $turma->update($request->all());

        return ApiResponse::success($turma);
    }

    public function destroy(string $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return ApiResponse::error('turma not found');
        }

        $turma->delete();

        return ApiResponse::success($turma);
    }
}
