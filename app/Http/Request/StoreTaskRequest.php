<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

  public function authorize(): bool
    {
        return true;
    }


public function rules()
{
    return [
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'status' => 'required|in:pendente,concluída', 
    ];
}

}