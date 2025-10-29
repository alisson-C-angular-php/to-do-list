<?php

namespace App\Http\Services;

use App\Models\TaskModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Exception;
class TaskService
{

    public function listarTask($status = null, $perPage = 10)
    {
        return TaskModel::query()
            ->select('id_tarefa', 'titulo', 'descricao', 'status', 'data_criacao', 'deleted_at', 'user_id')
            ->where('user_id', auth()->id())
            ->when($status && in_array($status, ['pendente', 'concluída']), function ($q) use ($status) {
                return $q->where('status', $status);
            })
            ->withTrashed()
            ->latest('data_criacao')
            ->paginate($perPage);
    }

    public function filtroTaskPorStatus($status)
    {
        return $this->listarTask($status);
    }

    public function criacaoTask(array $dados)
    {
        $dados['user_id'] ??= auth()->id();
        $dados['data_criacao'] ??= now();

        return TaskModel::create($dados);
        
    }

    public function atualizarTask($id, array $dados)
    {
        $task = TaskModel::findOrFail($id);
        $task->update($dados);
        return $task;
    }

    public function deletarTask($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->delete();
        return $task;
    }

    public function restaurarTask($id)
    {
        $task = TaskModel::withTrashed()->findOrFail($id);
        $task->restore();
        return $task;
    }

    public function buscarTask($id)
    {
        return TaskModel::findOrFail($id);
    }
}