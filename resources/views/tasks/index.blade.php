<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Lista de Tarefas
            </h2>

            <span
                class="inline-flex items-center gap-2 bg-blue-100 text-blue-800 text-sm font-medium px-4 py-1.5 rounded-full shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4" />
                </svg>
                {{ $tasks->count() }} tarefa{{ $tasks->count() != 1 ? 's' : '' }}
                encontrada{{ $tasks->count() != 1 ? 's' : '' }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-6 7v5l-4 2v-7L3 6V4z" />
                    </svg>
                    Filtro de Tarefas
                </h3>

                <form method="GET" class="flex flex-wrap gap-4 items-end">
                    <div class="flex flex-col">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Filtrar por status:
                        </label>
                        <select name="status"
                            class="w-48 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                            <option value="">Todos</option>
                            <option value="pendente" {{ request('status') === 'pendente' ? 'selected' : '' }}>Pendente
                            </option>
                            <option value="concluída" {{ request('status') === 'concluída' ? 'selected' : '' }}>Concluída
                            </option>
                        </select>
                    </div>

                    <button type="submit"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Filtrar
                    </button>

                    @if(request('status'))
                        <a href="{{ route('tasks.index') }}"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Limpar
                        </a>
                    @endif
                </form>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <div class="flex justify-center mt-6">
                    <div class="w-full max-w-6xl bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Título</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Criada em</th>
                                    <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($tasks as $task)
                                    <tr @if($task->trashed()) class="bg-red-50" @endif>
                                        <td class="px-4 py-3">
                                            <div class="font-semibold text-gray-900">{{ $task->titulo }}</div>
                                            @if($task->descricao)
                                                <p class="text-sm text-gray-500 line-clamp-2">
                                                    {{ Str::limit($task->descricao, 100) }}
                                                </p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-2 py-1 rounded-full text-xs font-semibold 
                                                            {{ $task->status === 'concluída' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($task->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-gray-600">
                                            {{ $task->data_criacao->format('d/m/Y') }}
                                        </td>























                                        <td class="px-4 py-3 text-right">
                                            <div class="flex justify-end items-center gap-2">

                                                @if($task->trashed())
                                                    <form action="{{ route('tasks.restore', $task) }}" method="POST"
                                                        class="inline">
                                                        @csrf @method('PATCH')
                                                        <button type="submit" title="Restaurar tarefa"
                                                            class="flex items-center gap-1 px-3 py-1 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600 transition">

                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M4 4v6h6M20 20v-6h-6M20 4l-8 8-8-8" />
                                                            </svg>
                                                            Restaurar
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('tasks.edit', $task) }}" title="Editar tarefa"
                                                        class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium text-gray-900 bg-yellow-400 rounded hover:bg-yellow-500 transition">

                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536M4 20h4l12-12-4-4L4 16v4z" />
                                                        </svg>
                                                        Editar
                                                    </a>

                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                        class="inline">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Excluir tarefa"
                                                            class="flex items-center gap-1 px-3 py-1 text-sm font-medium text-white bg-red-500 rounded hover:bg-red-600 transition"
                                                            onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Excluir
                                                        </button>
                                                    </form>
                                                @endif



                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-6 text-gray-500">
                                            Nenhuma tarefa encontrada.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-8 flex justify-center">
            {{ $tasks->appends(request()->query())->links() }}
        </div>

    </div>
</x-app-layout>