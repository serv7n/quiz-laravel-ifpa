<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{

    public function index()
    {
        return ApiResponse::success(data: Professor::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            "user" => "required|string|max:100",
            "email" => "nullable|email|unique:professor,email",
            "password" => "required|string|min:6",
        ]);

        $professor = Professor::create([
            'user' => $request->user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return ApiResponse::success($professor);
    }


    public function show(string $id)
    {
        $professor = Professor::find($id);
        if ($professor) {
            return ApiResponse::success($professor);
        } else {
            return ApiResponse::error("professor not found");
        }
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            "user" => "required|string|max:100",
            "email" => "nullable|email|unique:professor,email," . $id,
            "password" => "sometimes|required|string|min:6",
        ]);

        $professor = Professor::find($id);
        if ($professor) {
            $data = $request->all();

            if (isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }

            $professor->update($data);
            return ApiResponse::success($professor);
        } else {
            return ApiResponse::error("professor not found");
        }
    }


    public function destroy(string $id)
    {
        $professor = Professor::find($id);
        if ($professor) {
            $professor->delete();
            return ApiResponse::success($professor);
        } else {
            return ApiResponse::error("professor not found");
        }
    }
}
