<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    
public function rules()
{
    return [
        'titulo' => 'sometimes|required|string|max:255',
        'descricao' => 'nullable|string',
        'status' => 'sometimes|required|in:pendente,concluída',
    ];
}
}