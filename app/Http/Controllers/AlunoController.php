<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    /**
     * Listar todos os alunos.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return ApiResponse::success(data: $alunos);
    }


    public function store(Request $request)
    {
        $request->validate([
            "user" => "required",
            "email" => "nullable|email|unique:aluno",
            "senha" => "required",
            "pontuacao" => "nullable|integer",
            "turma_id" => "nullable|exists:turma,id"
        ]);

        $aluno = Aluno::create([
            'user' => $request->user,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'pontuacao' => $request->pontuacao,
            'turma_id' => $request->turma_id,
        ]);

        return ApiResponse::success($aluno);
    }


    public function show(string $id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return ApiResponse::error("Aluno não encontrado");
        }
        return ApiResponse::success($aluno);
    }


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
        if (!$aluno) {
            return ApiResponse::error("Aluno não encontrado");
        }

        $aluno->update([
            'user' => $request->user,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'pontuacao' => $request->pontuacao,
            'turma_id' => $request->turma_id,
        ]);

        return ApiResponse::success($aluno);
    }


    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return ApiResponse::error("Aluno não encontrado");
        }

        $aluno->delete();
        return ApiResponse::success("Aluno removido com sucesso");
    }


    public function login(Request $request)
    {
        $request->validate([
            "user" => "required",
            "senha" => "required"
        ]);

        $aluno = Aluno::where("user", $request->user)->first();

        if (!$aluno) {
            return ApiResponse::error("Usuário não encontrado");
        }

        if (!Hash::check($request->senha, $aluno->senha)) {
            return ApiResponse::error("Senha incorreta, tente novamente");
        }

        return ApiResponse::success($aluno);
    }
    public function refresh(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:aluno,id',
        ]);

        $aluno = Aluno::with('turma')->find($request->id);

        if (!$aluno) {
            return ApiResponse::error("Aluno não encontrado");
        }

        $dados = [
            'id' => $aluno->id,
            'user' => $aluno->user,
            'pontuacao' => $aluno->pontuacao,
            'turma' => $aluno->turma ? [
                'id' => $aluno->turma->id,
                'nome' => $aluno->turma->nome ?? null,
            ] : null,
        ];

        return ApiResponse::success($dados);
    }


    public function updateTurma(Request $request, $id)
    {
        $request->validate([
            'turma_id' => 'required|exists:turma,id',
        ]);

        $aluno = Aluno::find($id);
        if (!$aluno) {
            return ApiResponse::error('Aluno não encontrado');
        }

        $aluno->turma_id = $request->turma_id;
        $aluno->save();

        return ApiResponse::success($aluno, 'Turma atualizada com sucesso');
    }
    public function updatePontuacao(Request $request, $id)
    {
        $request->validate([
            'pontuacao' => 'required|integer',
        ]);

        $aluno = Aluno::find($id);
        if (!$aluno) {
            return ApiResponse::error('Aluno não encontrado');
        }

        $aluno->pontuacao = $request->pontuacao;
        $aluno->save();

        return ApiResponse::success($aluno, 'Pontuação atualizada com sucesso');
    }

}
