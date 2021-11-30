<?php

namespace App\Controllers;

class CatJogoController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadCatJogos');
        echo view('footer');
    }

    public function inserirCategoria()
    {
        $data['msg'] = '';
        $request = service('request');
        if ($request->getMethod() === 'post') {
            $CatJogoModel = new \App\Models\CatJogoModel();

            $CatJogoModel->set('nomeCatjogo', $request->getPost('nomeCatjogo'));

            if ($CatJogoModel->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
        }

        echo view('header');
        echo view('cadCatJogos', $data);
        echo view('footer');
    }
}

?>