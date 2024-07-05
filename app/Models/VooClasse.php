<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VooClasse extends Model
{
    use HasFactory;
    protected $fillable = ['voo_id', 'classe_nome', 'assentos'];

    public function voo()
    {
        return $this->belongsTo(Voo::class);
    }
}
