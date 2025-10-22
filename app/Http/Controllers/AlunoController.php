<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(data: Aluno::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "user" => "required",
            "email" => "nullable|email|unique:aluno",
            "senha" => "required",
            "pontuacao" => "nullable|integer",
            "turma_id" => "nullable|exists:turma,id"
        ]);

        $aluno = Aluno::create($request->all());
        return ApiResponse::success($aluno);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aluno = Aluno::find($id);
        if ($aluno) {
            return ApiResponse::success($aluno);
        } else {
            return ApiResponse::error("aluno not found");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "user" => "required",
            "email" => "nullable|email|unique:aluno,email," . $id,
            "senha" => "required",
            "pontuacao" => "nullable|integer",
            "turma_id" => "nullable|exists:turma,id"
        ]);

        $aluno = Aluno::find($id);
        if ($aluno) {
            $aluno->update($request->all());
            return ApiResponse::success($aluno);
        } else {
            return ApiResponse::error("aluno not found");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        if ($aluno) {
            $aluno->delete();
            return response()->json($aluno, 200);
        } else {
            return response()->json([["message" => "aluno not found"]], status: 404);
        }
    }
}
