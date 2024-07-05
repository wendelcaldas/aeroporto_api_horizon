<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use App\Models\VooClasse;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseApi;
use DateTime;

class VooController extends Controller
{
    //
    public function listaVoo()
    {
        $voos = Voo::all();

        return response()->json($voos);
    }

    public function cadastrarVoo(Request $request)
    {

        $validated = $request->validate([
            'aeroporto_origem_id' => 'required|exists:aeroportos,id',
            'aeroporto_destino_id' => 'required|exists:aeroportos,id',
            'data' => 'required|date_format:Y-m-d H:i:s',
            'classes' => 'nullable|array',
        ]);

        if($request->get('aeroporto_origem_id') == $request->get('aeroporto_destino_id'))
        {
            $response = new ResponseApi(false, null, 'Origem e Destino não podem ser iguais');
            return $response->send();
        }

        $vooExiste = Voo::where('aeroporto_origem_id', $validated['aeroporto_origem_id'])
            ->where('aeroporto_destino_id', $validated['aeroporto_destino_id'])
            ->where('partida_datetime', $validated['data'])
            ->first();

        if ($vooExiste) {
            $response = new ResponseApi(false, null, 'Registro já existente');
            return $response->send();
        }
    
        $voo = new Voo();
        $voo->numero_voo = $this->geraNumeroVoo();
        $voo->aeroporto_origem_id = $request->get('aeroporto_origem_id');
        $voo->aeroporto_destino_id = $request->get('aeroporto_destino_id');
        $voo->partida_datetime = $request->get('data');
        $voo->save();

        $classes = $request->get('classes');

        if($classes && !empty($classes))
        {
            foreach ($classes as $classe) {
                // var_dump($classe['total_assentos']);exit;
                $classeVoo = new VooClasse();
                $classeVoo->voo_id = $voo->id;
                $classeVoo->classe_id = $classe['classe_id'];
                $classeVoo->total_assentos = $classe['total_assentos'];
                $classeVoo->disponivel = $classe['total_assentos'];
                $classeVoo->valor_assento = $classe['valor'];
                $classeVoo->save();
            }
        }
        

        $response = new ResponseApi(true, $voo, 'Cadastro realizado com sucesso');
        return $response->send();

    }
    
    public function geraNumeroVoo(){
        $numeroVoo = rand(1000, 9999);
        $voo = Voo::where('numero_voo', $numeroVoo)->exists();
        
        if($voo)
        {
            $this->geraNumeroVoo();
        }

        return $numeroVoo;
    }

    public function alteraHorarioVoo(Request $request)
    {

        $validated = $request->validate([
            'nova_data_hora' => 'required|date_format:Y-m-d H:i:s',
            'numero_voo' => 'required'
        ]);

        $numVoo = $request->get('numero_voo');
        $nova_data_hora = new DateTime($request->get('nova_data_hora'));
        $agora = new DateTime();
        // valida o horario

        if ($nova_data_hora <= $agora){
            $response = new ResponseApi(false, null, 'Não é possível altera um voo para o passado');
            return $response->send();
        }

        $voo = Voo::where('numero_voo', $numVoo)->first();
        // var_dump($voo);exit;
        if(!$voo){
            $response = new ResponseApi(false, null, 'Numero de voo não localizado');
            return $response->send();
        }

        Voo::where('numero_voo', $numVoo)->update(['partida_datetime' => $nova_data_hora]);

        $vooAtualizado = Voo::where('numero_voo', $numVoo)->first();

        $response = new ResponseApi(true, $vooAtualizado, 'Alteração realizada com sucesso');
        return $response->send();
    }

    public function cancelarVoo(Request $request)
    {
        $validated = $request->validate([
            'numero_voo' => 'required'
        ]);
        
        $numeroVoo = $request->get('numero_voo');
        
        $voo = Voo::where('numero_voo', $numeroVoo)->first();
        
        if(!$voo)
        {
            $response = new ResponseApi(false, null, 'Voo não encontrado');
            return $response->send();
        }

        Voo::where('numero_voo', $numeroVoo)->update(['status' => 0]);

        $vooCancelado = Voo::where('numero_voo', $numeroVoo)->first();

        $response = new ResponseApi(true, $vooCancelado, 'Voo cancelado');
        return $response->send();
    }

}
