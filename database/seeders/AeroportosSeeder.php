<?php

namespace Database\Seeders;

use App\Models\Aeroporto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AeroportosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aeroportos = [
            // São Paulo (SP) 1
            ['nome' => 'Aeroporto de Congonhas', 'iata' => 'cgh', 'cidade_id' => 1],
            ['nome' => 'Aeroporto Internacional de Guarulhos', 'iata' => 'gru', 'cidade_id' => 1],
            ['nome' => 'Aeroporto de Viracopos', 'iata' => 'vcp', 'cidade_id' => 2],

            // Rio de Janeiro (RJ)
            ['nome' => 'Aeroporto Santos Dumont', 'iata' => 'sdu', 'cidade_id' => 3],
            ['nome' => 'Aeroporto Internacional do Galeão', 'iata' => 'gig', 'cidade_id' => 3],

            // Minas Gerais (MG)
            ['nome' => 'Aeroporto Internacional de Confins', 'iata' => 'cnf', 'cidade_id' => 4],
            ['nome' => 'Aeroporto de Uberlândia', 'iata' => 'udi', 'cidade_id' => 5],

            // Bahia (BA)
            ['nome' => 'Aeroporto Internacional de Salvador', 'iata' => 'ssa', 'cidade_id' => 6],
            ['nome' => 'Aeroporto de Porto Seguro', 'iata' => 'bps', 'cidade_id' => 7],

            // Paraná (PR)
            ['nome' => 'Aeroporto Internacional Afonso Pena', 'iata' => 'cwb', 'cidade_id' => 8],
            ['nome' => 'Aeroporto Internacional de Foz do Iguaçu', 'iata' => 'igs', 'cidade_id' => 9],

            // Distrito Federal (DF)
            ['nome' => 'Aeroporto Internacional de Brasília', 'iata' => 'bsb', 'cidade_id' => 10],

            // Pernambuco (PE)
            ['nome' => 'Aeroporto Internacional do Recife', 'iata' => 'rec', 'cidade_id' => 11],
            ['nome' => 'Aeroporto Internacional de Petrolina', 'iata' => 'pnz', 'cidade_id' => 12],

            // Rio Grande do Sul (RS)
            ['nome' => 'Aeroporto Internacional Salgado Filho', 'iata' => 'poa', 'cidade_id' => 13],
            ['nome' => 'Aeroporto Internacional de Porto Alegre', 'iata' => 'pex', 'cidade_id' => 13],

            // Amazonas (AM)
            ['nome' => 'Aeroporto Internacional Eduardo Gomes', 'iata' => 'mao', 'cidade_id' => 14],
            ['nome' => 'Aeroporto Internacional de Manaus', 'iata' => 'mcz', 'cidade_id' => 14],

            // Sergipe (SE)
            ['nome' => 'Aeroporto de Aracaju', 'iata' => 'aju', 'cidade_id' => 15],
            ['nome' => 'Aeroporto de Tobias Barreto', 'iata' => 'tbb', 'cidade_id' => 16],
        ];

        foreach ($aeroportos as $aeroporto) {
            Aeroporto::create($aeroporto);
        }
    }
}
