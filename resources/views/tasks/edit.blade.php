<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5h2m-1 0v14m-7-7h14" />
                </svg>
                Editar Tarefa
            </h2>

            <a href="{{ route('tasks.index') }}"
                class="inline-flex items-center gap-2 text-blue-700 font-medium hover:text-blue-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7" />
                </svg>
                Voltar à lista
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl border border-gray-200 p-8">
                <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Campo Título -->
                    <div>
                        <label for="titulo" class="block text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Título da Tarefa
                        </label>
                        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $task->titulo) }}"
                            class="w-full border border-black rounded-lg px-4 py-2 text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            placeholder="Digite o título da tarefa" required>
                        @error('titulo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Status
                        </label>
                        <select name="status" id="status"
                            class="w-full border border-black rounded-lg px-4 py-2 text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                            <option value="">Selecione...</option>
                            <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="concluída" {{ $task->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Descrição -->
                    <div>
                        <label for="descricao" class="block text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h8M8 14h6m2 5H8a2 2 0 01-2-2V7a2 2 0 012-2h8l4 4v8a2 2 0 01-2 2z" />
                            </svg>
                            Descrição (opcional)
                        </label>
                        <textarea name="descricao" id="descricao" rows="4"
                            class="w-full border border-black rounded-lg px-4 py-2 text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            placeholder="Descreva a tarefa (opcional)">{{ old('descricao', $task->descricao) }}</textarea>
                        @error('descricao')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('tasks.index') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-400 text-gray-700 hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </a>
                        <button type="submit"
                            
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition"
                            
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Atualizar Tarefa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
