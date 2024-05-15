<head>

    <title>Formulário de Atualização de Cliente</title>
    <style>
        .instrucao {


            font-size: 20px;
            font-weight: bold;
            text-align: center;


        }

        form {
            background-color: #fff;
            border-radius: 5px;
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 96%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 20%;
            border-radius: 3px;
            cursor: pointer;
            margin: 0 auto;
            display: block;
        }

        input[type="submit"]:hover {
            background-color: #45a035;
        }
    </style>
</head>

<body>
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="/clientes/atualizar" method="post" id="atualizar">
        <?= csrf_field() ?>

        <p class="instrucao">Digite aqui os dados antigos do cliente</p>

        <label for="nome_antigo">Nome</label>
        <input type="text" name="nome_antigo" id="nome_antigo" onkeypress="return onlyAlphabets(event)" value="<?= htmlspecialchars($_GET['nome_antigo']) ?>">

        <label for="sobrenome_antigo">Sobrenome</label>
        <input type="text" name="sobrenome_antigo" id="sobrenome_antigo" onkeypress="return onlyAlphabets(event)" value="<?= htmlspecialchars($_GET['sobrenome_antigo']) ?>">

        <label for="cpf_antigo">CPF</label>
        <input type="text" name="cpf_antigo" id="cpf_antigo" onkeypress="return onlyNumbers(event)" value="<?= htmlspecialchars($_GET['cpf_antigo']) ?>">

        <p class="instrucao">Insira aqui os novos dados do cliente</p>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('nome') ?>">

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="sobrenome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('sobrenome') ?>">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" onkeypress="return onlyNumbers(event)" value="<?= set_value('cpf') ?>">

        <input type="submit" name="submit" value="Editar cliente">
    </form>

    <script>
        function onlyAlphabets(event) {
            var key = event.keyCode;
            if (!((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 8 || key == 32)) {
                alert("Apenas letras são permitidas neste campo.");
                return false;
            }
            return true;
        }

        function onlyNumbers(event) {
            var key = event.keyCode;
            if (!(key >= 48 && key <= 57)) {
                alert("Apenas números são permitidos neste campo.");
                return false;
            }
            return true;
        }
    </script>
</body>