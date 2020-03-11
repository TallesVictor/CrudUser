<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $table='user';
    protected $fillable=['nome','email', 'cpf', 'telefone', 'endereco', 'estado', 'cidade', 'dataNascimento'];
}
