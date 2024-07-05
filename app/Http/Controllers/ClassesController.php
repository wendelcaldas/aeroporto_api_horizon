<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Responses\ResponseApi;

class ClassesController extends Controller
{
    //

    public function listarClasses()
    {
        $classes = Classe::all();

        $response = new ResponseApi(true, $classes, 'Pesquisa realizada com sucesso');
        return $response->send();
    }

    public function criarClasse(Request $request)
    {
        $classe = new Classe();
        $classe->nome_classe = $request->get('nome_classe');
        $classe->descricao_classe = $request->get('descricao_classe');
        $classe->save();

        $response = new ResponseApi(true, $classe, 'Cadastro realizado com sucesso');
        return $response->send();
    }

    public function desativaClasse(Request $request)
    {
        $id = $request->get('id_classe');

        Classe::where('id', $id)->update(['status' => 0]);

        // $classe = Classe::where('id', $id);

        $response = new ResponseApi(true, null, 'Classe desativada com sucesso');
        return $response->send();
    }

    public function ativaClasse(Request $request)
    {
        $id = $request->get('id_classe');

        Classe::where('id', $id)->update(['status' => 1]);

        $classe = Classe::where('id', $id);

        $response = new ResponseApi(true, null, 'Classe ativada com sucesso');
        return $response->send();
    }
}
