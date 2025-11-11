<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfessorTurmaController;
use App\Http\Controllers\QuestoesController;
use App\Http\Controllers\TurmaController;
use App\Models\Questoes;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return ApiResponse::success('Api is running');
});

Route::get('/turma/{id}/comecou/{value}', [TurmaController::class, 'alterarComecou']);
Route::post('/turma/reset-pontuacao', [AlunoController::class, 'resetPontuacaoTurma']);
Route::apiResource("turma", TurmaController::class);
Route::get('/turma/{id}/questoes', [TurmaController::class, 'listarQuestoes']);
Route::delete('/questoes', [QuestoesController::class, 'destroyAll']);

Route::apiResource("admin", AdminController::class);
Route::post('/admin/login', [AdminController::class, 'login']);


Route::apiResource("aluno", controller: AlunoController::class);
Route::post("/aluno/login", [AlunoController::class, "login"]);
Route::post('/aluno/refresh', [AlunoController::class, 'refresh']);
Route::put('/aluno/{id}/turma', [AlunoController::class, 'updateTurma']);
Route::put('/aluno/{id}/pontuacao', [AlunoController::class, 'updatePontuacao']);
Route::post('/alunos/ranking', [AlunoController::class, 'ranking']);


Route::apiResource("professor", controller: ProfessorController::class);
Route::prefix('professor/turma')->group(function () {
    Route::get('/', [ProfessorTurmaController::class, 'index']);
    Route::post('/', [ProfessorTurmaController::class, 'store']);
    Route::get('{professor_id}/{turma_id}', action: [ProfessorTurmaController::class, 'show']);
    Route::put('{professor_id}/{turma_id}', [ProfessorTurmaController::class, 'update']);
    Route::delete('{professor_id}/{turma_id}', [ProfessorTurmaController::class, 'destroy']);
});

Route::apiResource("questoes", controller: QuestoesController::class);

Route::get('/questoes/usuario/{id}', action: [QuestoesController::class, 'porUsuario']);
Route::delete('/turma/{id}/questoes', [TurmaController::class, 'apagarTodasQuestoes']);
// Route::post("/login", [AuthController::class,"login"]);
