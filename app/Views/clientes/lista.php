<head>

    <script>
        function deletarUsuario(cpf) {


            var nome = document.getElementById(cpf).getElementsByClassName('nome')[0].textContent;
            var sobrenome = document.getElementById(cpf).getElementsByClassName('sobrenome')[0].textContent;
            var deletar = confirm("Você gostaria de deletar o usuário " + nome + "?" + "\n" + "Essa ação não pode ser desfeita.");

        }



        function editarUsuario(cpf, nome, sobrenome) {

            location.href = "http://localhost:8080/clientes/atualizar?nome_antigo=" + nome + "&sobrenome_antigo=" + sobrenome + "&cpf_antigo=" + cpf;




        };
    </script>
    <style>
        .campo {

            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 30px;
        }

        .lateral {
            margin: 1px;
            font-style: bold;
            height: fit-content;
        }


        .vazia {
            display: flex;
            background-color: #f4f4f4;
            padding: 20px;
            width: 100%;

        }

        .indice {
            display: flex;
            justify-content: left;
            background-color: #f4f4f4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: fit-content;
            align-items: center;

        }

        .usuario {
            display: flex;
            justify-content: left;
            background-color: #f4f4f4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: fit-content;
            align-items: center;

        }

        .info {
            margin: 1px;
            padding: 10px 10px;
            width: 25%;
        }

        .nome {
            background-color: #fff;
            color: #333;
            font-size: 24px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        .sobrenome {
            background-color: #fff;
            color: #333;
            font-size: 24px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        .cpf {
            background-color: #fff;
            color: #333;
            font-size: 24px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .botao {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .botao-deletar {
            background-color: #ff3333;
            color: white;
        }

        .botao-editar {
            background-color: #3385ff;
            color: white;
        }
    </style>
</head>


<div class="indice">

    <div class="campo info"> Nome</div>
    <div class="campo info">Sobrenome</div>
    <div class="campo info">CPF</div>
    <div class="campo lateral">Pesquisar</div>
</div>


<?php foreach ($dados as $user) : if (empty($user)) {
        break;
    }

?>



    <div class="usuario" id=<?= esc($user['cpf']) ?>>

        <div class="nome info"><?= esc($user['nome']) ?></div>
        <div class="sobrenome info"><?= esc($user['sobrenome']) ?></div>
        <div class="cpf info"><?= esc($user['cpf']) ?></div>

        <div class="lateral">

            <form action="http://localhost:8080/clientes/deletar" method="post" onsubmit="return confirm('Você realmente quer EXCLUIR o usuário de CPF '+ <?= esc($user['cpf']) ?>) + '?';">

                <?= csrf_field() ?>

                <input type="hidden" name="nome" value=<?= esc($user['nome']) ?>>
                <input type="hidden" name="cpf" value=<?= esc($user['cpf']) ?>>
                <input type="hidden" name="sobrenome" value=<?= esc($user['sobrenome']) ?>>

                <button class="botao botao-deletar" type="submit">Deletar</button>
            </form>


            <button class="botao botao-editar" onclick="editarUsuario('<?= esc($user['cpf']) ?>','<?= esc($user['nome']) ?>', '<?= esc($user['sobrenome']) ?>')">Editar</button>
        </div>
    </div>


    <div class="vazia"> </div>

<?php endforeach ?>