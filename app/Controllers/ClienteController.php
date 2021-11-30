<?php

namespace App\Controllers;

class ClienteController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadCliente');
        echo view('footer');
    }

    public function inserirCliente()
    {
        $data['msg'] = '';
        $request = service('request');

        if ($request->getMethod() === 'post') {
            $ClienteModel = new \App\Models\ClienteModel();

            $ClienteModel->set('codusu_FK', $request->getPost('codUsu'));
            $ClienteModel->set('CpfCli', $request->getPost('CpfCli'));
            $ClienteModel->set('nomeCli', $request->getPost('nomeCli'));
            $ClienteModel->set('foneCli', $request->getPost('foneCli'));


            if ($ClienteModel->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
            
        }
    }

    public function listaCodCliente()
    {
        $request = service('request');
        $data['usuario'] = "";

        if ($request->getPost('codUsu')) {
            $codusuario = $request->getPost('codUsu');
            $UsuarioModel = new \App\Models\UsuarioModel();
            $registros = $UsuarioModel->find($codusuario);
            $data['usuario'] = $registros;
        }

        if ($request->getPost('CpfCli') && $request->getPost('nomeCli') && $request->getPost('foneCli')) {
            $this->inserirCliente();
        }

        echo view('header');
        echo view('cadCliente', $data);
        echo view('footer');
    }

    public function buscaPrincipalCliente(){

        $request = service('request');
        $codcliente = $request->getPost('CpfCli');
        $ClienteModel = new \App\Models\ClienteModel();

        if($codcliente){
            $registros = $ClienteModel->find($codcliente);
            var_dump($registros);
        } 

        
        if ($request->getPost('codCliDeletar')) {
            $this->clienteExcluir($request->getPost('codCliDeletar'));
            return redirect()->to(base_url('Home'));
        }
        
        if ($request->getPost('codCliAlterar')) {
            return $this->clienteAlterar();
        }

        $data['cliente'] = $registros;        

        echo view('header');
        echo view('buscaCliente', $data);
        echo view('footer');
    }

    public function clienteAlterar()
    {
        $request = service('request');
        $codCliAlterar = $request->getPost('codCliAlterar');
        $CpfCli = $request->getPost('CpfCli');
        $nomeCli = $request->getPost('nomeCli');
        $foneCli = $request->getPost('foneCli');
        
        $ClienteModel = new \App\Models\ClienteModel();
        $registros = $ClienteModel->find($codCliAlterar);  
        
        if ($request->getPost('nomeFun') && $request->getPost('foneFun')) {
            $registros->CpfCli = $CpfCli;
            $registros->nomeFun = $nomeCli;
            $registros->foneFun = $foneCli;
            $ClienteModel->update($codCliAlterar,$registros);
            
            return redirect()->to(base_url('ClienteController/buscaPrincipalCliente/'));
        }
        
        $data['cliente'] = $registros;
        
        echo view('header');
        echo view('alterarFormUsuario', $data);
        echo view('footer');
    }

    public function clienteExcluir($codCliDeletar)
    {
        if (is_null($codCliDeletar)) {
            return redirect()->to(base_url('ClienteController/buscaPrincipalCliente'));
        }
    
        $ClienteModel = new \App\Models\ClienteModel();

        if ($ClienteModel->delete($codCliDeletar)) {
            //return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        } else {
            //return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }
    }

    
}
