<?php

namespace App\Http\Controllers;

use App\Models\VooClasse;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseApi;

class PassagemController extends Controller
{
    //
    public function alterarValorPassagem(Request $request)
    {
        $voo = $request->get('voo_id');
        $classe = $request->get('clase_id');
        $novoValor = $request->get('novo_valor');

        $passagem = VooClasse::where('voo_id', $voo)
        ->where('classe_id', $classe)
        ->first();
    
        if ($passagem) {
            $passagem->valor_assento = $novoValor;
            $passagem->save();
            $response = new ResponseApi(true, $passagem, 'Valor da passagem alterada');
            return $response->send();
        } else {
            $response = new ResponseApi(false, null, 'Passagem não encontrada com os dados informados');
            return $response->send();
        }

    }

    public function buscaPassagem($origem, $destino, $valor = null)
    {

    }
}
