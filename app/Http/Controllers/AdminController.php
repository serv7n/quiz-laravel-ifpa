<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    public function index()
    {
        return ApiResponse::success(data: Admin::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            "user" => "required|string|max:100",
            "email" => "nullable|email|unique:admin,email",
            "senha" => "required|string|min:6",
        ]);

        $admin = Admin::create([
            'user' => $request->user,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        return ApiResponse::success($admin);
    }

 
    public function show(string $id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            return ApiResponse::success($admin);
        } else {
            return ApiResponse::error("admin not found");
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "user" => "required|string|max:100",
            "email" => "nullable|email|unique:admin,email," . $id,
            "senha" => "sometimes|required|string|min:6",
        ]);

        $admin = Admin::find($id);
        if ($admin) {
            $data = $request->all();

            if (isset($data['senha'])) {
                $data['senha'] = bcrypt($data['senha']);
            }

            $admin->update($data);
            return ApiResponse::success($admin);
        } else {
            return ApiResponse::error("admin not found");
        }
    }

  

    public function destroy(string $id)
    {
        $admin = Admin::find($id);
        if ($admin) {
            $admin->delete();
            return ApiResponse::success($admin);
        } else {
            return ApiResponse::error("admin not found");
        }
    }
    public function login(Request $request)
{
    $request->validate([
        "email" => "required|email",
        "senha" => "required|string|min:6",
    ]);

    $admin = Admin::where("email", $request->email)->first();

    if (!$admin || !Hash::check($request->senha, $admin->senha)) {
        return ApiResponse::error("Credenciais inválidas", 401);
    }

    return ApiResponse::success([
        "messege" => "Login realizado com sucesso!",
        "admin" => $admin,
    ]);
}


}
