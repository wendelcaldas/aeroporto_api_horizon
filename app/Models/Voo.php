<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;
    protected $fillable = ['aeroporto_origem_id', 'aeroporto_destino_id', 'partida_datetime'];
    protected $hidden = ['created_at', 'updated_at'];

    public function classes()
    {
        return $this->hasMany(VooClasse::class);
    }

    public function origem()
    {
        return $this->belongsTo(Cidade::class, 'aeroporto_origem_id');
    }

    public function destino()
    {
        return $this->belongsTo(Cidade::class, 'aeroporto_destino_id');
    }
}
