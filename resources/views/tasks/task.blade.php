@extends('layouts.app')
@section('title', 'Lista de Tarefas')

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nova Tarefa</a>


<form method="GET" class="mb-3">
    <div class="row g-2">
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">Todos</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ request('status') == 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
        </div>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Status</th>
            <th>Criada em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            <tr @if($task->trashed()) class="table-danger" @endif>
                <td>{{ $task->title }}</td>
                <td>
                    <span class="badge bg-{{ $task->status == 'concluída' ? 'success' : 'warning' }}">
                        {{ $task->status }}
                    </span>
                </td>
                <td>
                    @if($task->trashed())
                        <form action="{{ route('tasks.restore', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('POST')
                            <button class="btn btn-sm btn-info">Restaurar</button>
                        </form>
                    @else
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">Nenhuma tarefa encontrada.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $tasks->appends(request()->query())->links() }}
@endsection