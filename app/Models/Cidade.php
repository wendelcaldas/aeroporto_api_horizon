<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidades';

    protected $fillable = ['cidade', 'uf'];
    protected $hidden = ['created_at', 'updated_at'];

    public function aeroportos()
    {
        return $this->hasMany(Aeroporto::class);
    }
}
