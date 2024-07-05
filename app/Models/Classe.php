<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = 'classes';

    protected $fillable = ['nome_classe', 'descricao_classe', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
}
