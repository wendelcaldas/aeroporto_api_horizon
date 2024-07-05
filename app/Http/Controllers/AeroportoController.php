<?php

namespace App\Http\Controllers;

use App\Models\Aeroporto;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseApi;

class AeroportoController extends Controller
{
    public function buscaAeroporto($id = null)
    {

        if($id !== null){

            $aeroporto = Aeroporto::find($id);

            if($aeroporto->isEmpty()){
                $response = new ResponseApi(false, null, 'Consulta sem resultados');
                return $response->send();
            }

            return response()->json($aeroporto);
        }
        // $aeroportos = Aeroporto::all();
        $aeroportos = Aeroporto::with('cidade')->get();

        if($aeroportos->isEmpty()){
            $response = new ResponseApi(true, null, 'Consulta sem resultados');
            return $response->send();
        }

        $response = new ResponseApi(true, $aeroportos, 'Pesquisa realizada com sucesso');
        return $response->send();
    }
}
