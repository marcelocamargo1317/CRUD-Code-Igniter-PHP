<?php

namespace App\Controllers;

use App\Models\ClientesModel;

class Clientes extends BaseController

{
    private $clientesModel;

    public function __construct()
    {
        $this->clientesModel = new ClientesModel();
    }


    public function listarClientes(string $cpf = null)

    {

        $data = ['dados' => $this->clientesModel->getClientes($cpf)];
        array_push($data, []);
        return view('templates/header') . view('clientes/lista', $data);
    }

    public function novoCliente()
    {
        helper('form');
        return view('clientes/cadastrar');
    }

    public function insereCliente()
    {

        helper('form');

        $cliente = $this->request->getPost(['nome', 'sobrenome', 'cpf']);
        $this->clientesModel->insertClientes($cliente);

        return view('clientes/sucesso', $cliente);
    }


    public function editarCliente()
    {
        helper('form');
        return view('clientes/atualizar', ['Edite' => 'Edite os dados do cliente']);
    }

    public function atualizaCliente()
    {

        helper('form');

        $cliente = $this->request->getPost(['nome', 'sobrenome', 'cpf']);
        $cliente_antigo = $this->request->getPost(['nome_antigo', 'sobrenome_antigo', 'cpf_antigo']);
        $this->clientesModel->updateClientes($cliente, $cliente_antigo);

        return view('clientes/atualizado', $cliente);
    }


    public function formDeletarCliente()
    {
        helper('form');
        return view('templates/header_delete', ['deletar' => 'ATENÇÃO: exclua o cliente pelo CPF, essa ação não pode ser desfeita'])
            . view('clientes/deletar');
    }

    public function deletadoCliente()
    {

        helper('form');

        $cpf =  implode($this->request->getPost(['cpf']));

        trim($cpf);

        $this->clientesModel->deleteClientes($cpf);
        $data = ['cpf' => $cpf];

        return view('clientes/deletado', $data);
    }
}
