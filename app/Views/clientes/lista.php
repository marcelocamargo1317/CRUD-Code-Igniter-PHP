<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Usuários</title>
    <script>
        function deletarUsuario(cpf) {
            var nome = document.getElementById(cpf).getElementsByClassName('nome')[0].textContent;
            var sobrenome = document.getElementById(cpf).getElementsByClassName('sobrenome')[0].textContent;
            var deletar = confirm("Você gostaria de deletar o usuário " + nome + "?" + "\n" + "Essa ação não pode ser desfeita.");
        }

        function editarUsuario(cpf, nome, sobrenome) {
            location.href = "http://localhost:8080/clientes/atualizar?nome_antigo=" + nome + "&sobrenome_antigo=" + sobrenome + "&cpf_antigo=" + cpf;
        }
    </script>
    <style>
        body {
            margin: 0;
            font-family: 'Verdana', Geneva, Tahoma, sans-serif;
            background-color: #e8f5e9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header,
        .usuario {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .header {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .header .campo,
        .usuario .info {
            flex: 1;
            padding: 0 10px;
            text-align: center;
        }

        .info {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .botao {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .botao-deletar {
            background-color: #ff5252;
            color: white;
        }

        .botao-editar {
            background-color: #42a5f5;
            color: white;
        }

        .botao-adicionar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50%;
            padding: 10px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .botao-adicionar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .botao-adicionar svg {
            margin-right: 10px;
            fill: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="campo">Nome</div>
            <div class="campo">Sobrenome</div>
            <div class="campo">CPF</div>
            <div class="campo">Ações</div>
        </div>

        <?php foreach ($dados as $user) : if (empty($user)) {
                break;
            } ?>
            <div class="usuario" id="<?= esc($user['cpf']) ?>">
                <div class="info nome"><?= esc($user['nome']) ?></div>
                <div class="info sobrenome"><?= esc($user['sobrenome']) ?></div>
                <div class="info cpf"><?= esc($user['cpf']) ?></div>
                <div class="info actions">
                    <form action="http://localhost:8080/clientes/deletar" method="post" onsubmit="return confirm('Você realmente quer EXCLUIR o usuário de CPF ' + '<?= esc($user['cpf']) ?>' + '?');">
                        <?= csrf_field() ?>
                        <input type="hidden" name="nome" value="<?= esc($user['nome']) ?>">
                        <input type="hidden" name="cpf" value="<?= esc($user['cpf']) ?>">
                        <input type="hidden" name="sobrenome" value="<?= esc($user['sobrenome']) ?>">
                        <button class="botao botao-deletar" type="submit">Deletar</button>
                    </form>
                    <button class="botao botao-editar" onclick="editarUsuario('<?= esc($user['cpf']) ?>', '<?= esc($user['nome']) ?>', '<?= esc($user['sobrenome']) ?>')">Editar</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
<div style="display: flex; justify-content: center;">
    <button class="botao-adicionar" onclick="location.href='/clientes/cadastrar/'">
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 10h3v2h-3v3h-2v-3H8v-2h3V9h2v3z" fill="black" />
        </svg>
        Adicionar usuário
    </button>
</div>

</html>