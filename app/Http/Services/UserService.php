<?php
namespace App\Http\Services;

use App\Models\UserModel;

class UserService {
    
    public function listar() {
        $users = UserModel::all();
        if ($users->isEmpty()) {
            return ['success' => false, 'message' => 'Nenhum usuário encontrado'];
        }
        return ['success' => true, 'message' => 'Usuários encontrados', 'data' => $users];
    }

 
    public function atualizarUser($id, $dados) {
        $user = UserModel::find($id);
        if (!$user) {
            return ['success' => false, 'message' => 'Usuário não encontrado'];
        }

        try {
            $user->update([
                'name' => $dados['name'] ?? $user->name,
                'email' => $dados['email'] ?? $user->email,
            ]);
            return ['success' => true, 'message' => 'Usuário atualizado com sucesso', 'data' => $user];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao atualizar usuário: ' . $e->getMessage()];
        }
    }

    public function deletarUser($id) {
        $user = UserModel::find($id);
        if (!$user) {
            return ['success' => false, 'message' => 'Usuário não encontrado'];
        }

        try {
            $user->delete();
            return ['success' => true, 'message' => 'Usuário deletado com sucesso'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao deletar usuário: ' . $e->getMessage()];
        }
    }

    public function criacaoUser($user) {
        if (!isset($user) || empty($user)) {
            return ['success' => false, 'message' => 'Dados do usuário inválidos'];
        }

        try {
            $userCreate = UserModel::create($user);
            return ['success' => true, 'message' => 'Usuário criado com sucesso', 'data' => $userCreate];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao criar usuário: ' . $e->getMessage()];
        }
    }
}