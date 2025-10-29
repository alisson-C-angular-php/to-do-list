<?php

namespace App\Http\Controllers;

use App\Http\Services\TaskService;
use App\Http\Request\StoreTaskRequest;
use App\Http\Request\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
{
    $status = $request->get('status');
    $perPage = $request->get('per_page', 10); // padrão: 10 tarefas por página

    $tasks = $this->taskService->listarTask($status, $perPage);

    return view('tasks.index', compact('tasks'));
}


        public function cad(){
            return view('_form');
        }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        
        $this->taskService->criacaoTask($request->validated());


        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit($id)
    {
        $task = $this->taskService->buscarTask($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $this->taskService->atualizarTask($id, $request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $this->taskService->deletarTask($id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa excluída (soft delete)');
    }

    public function restore($id)
    {
        $this->taskService->restaurarTask($id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarefa restaurada com sucesso!');
    }
}