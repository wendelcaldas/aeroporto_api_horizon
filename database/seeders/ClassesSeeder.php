<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $classes = [
            ['nome_classe' => 'Economica', 'descricao_classe' => 'Cadeiras padrão'],
            ['nome_classe' => 'Executiva', 'descricao_classe' => 'Mais espaço para você'],
            ['nome_classe' => 'Premium', 'descricao_classe' => 'Mais espaço e mais conforto']
        ];

        foreach ($classes as $classe) {
            Classe::create($classe);
        }
    }
}
