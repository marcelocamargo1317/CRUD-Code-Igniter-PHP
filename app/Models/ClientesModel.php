<?php

namespace App\Models;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;

class ClientesModel extends Model

{

    //nome da tabela do bancos de dados
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    //campos permitidos, ID é auto incrementado
    protected $allowedFields = ['nome', 'sobrenome', 'cpf'];


    //CREATE
    public function insertClientes(array $cliente)
    {

        $cpf = $cliente['cpf'];
        $length = mb_strlen($cpf);

        $this->confereCPF($cpf, $length);

        $this->save($cliente);
    }




    //READ
    public function getClientes(string $cpf = null)
    {

        $data = [];

        if ($cpf === null || empty($cpf)) {
            $data = $this->findAll();
        } else {
            $this->confereCPF($cpf, mb_strlen($cpf));

            $data = [$this->where('cpf', $cpf)->first()];
        }

        return $data;
    }


    //UPDATE
    public function updateClientes(array $cliente, array $cliente_antigo)
    {
        $cpf_antigo = $cliente_antigo['cpf_antigo'];
        $cpf = $cliente['cpf'];

        $data = $this->getClientes($cpf_antigo);
        $id = $data[0]['id'];
        $length = mb_strlen($cpf);

        $this->confereCPF($cpf, $length);

        $this->update($id, $cliente);
    }

    //DELETAR
    public function deleteClientes(string $cpf)
    {
        $length = mb_strlen($cpf);

        $this->confereCPF($cpf, $length);

        $cliente = $this->where(['cpf' => $cpf])->first();

        return $this->delete($cliente);
    }


    //precisa ser aprimorado, apenas exemplo
    private function confereCPF(string $cpf, int $length)
    {
        if (!is_numeric($cpf)) {
            throw new PageNotFoundException("Atenção: informar somente números no CPF");
        }

        if ($length != 11) {
            throw new PageNotFoundException("Atenção: O CPF informado possui " . $length . " digitos. Confira o CPF digitado");
        }
    }
}
