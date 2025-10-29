<div class="mb-3">
    <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
    <input 
        type="text" 
        name="title" 
        id="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $task->title ?? '') }}"
        maxlength="255"
        required
    >
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <textarea 
        name="description" 
        id="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $task->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select 
        name="status" 
        id="status"
        class="form-select @error('status') is-invalid @enderror"
    >
        <option value="pendente" {{ old('status', $task->status ?? 'pendente') === 'pendente' ? 'selected' : '' }}>
            Pendente
        </option>
        <option value="concluída" {{ old('status', $task->status ?? '') === 'concluída' ? 'selected' : '' }}>
            Concluída
        </option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-success">
        @if(isset($task)) Atualizar @else Criar @endif
    </button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
</div>