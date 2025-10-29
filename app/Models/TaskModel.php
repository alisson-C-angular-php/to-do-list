<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_listatarefa';

    protected $primaryKey = 'id_tarefa'; 

    public $incrementing = true; 
    protected $keyType = 'int';  

    const STATUS_PENDENTE = 'pendente';
    const STATUS_CONCLUIDA = 'concluida';

    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'data_criacao',
        'ativo',
        'user_id' 
    ];

    protected $casts = [
        'data_criacao' => 'datetime',
        'ativo' => 'boolean'
    ];

    protected $attributes = [
        'status' => self::STATUS_PENDENTE,
    ];

    public function getRouteKeyName()
    {
        return $this->primaryKey; 
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}