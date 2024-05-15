<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
        }

        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            margin: 0 auto 10px auto;
            display: block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            width: 50%;
            border-radius: 5px;
            margin: 20px auto 0 auto;
            display: block;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #45a035;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Cadastre um novo cliente</h1>
    <div class="message">
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
    </div>

    <form action="/clientes/cadastrar" method="post">
        <?= csrf_field() ?>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('nome') ?>">

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="sobrenome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('sobrenome') ?>">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" onkeypress="return onlyNumbers(event)" value="<?= set_value('cpf') ?>">

        <input type="submit" name="submit" value="Cadastrar cliente">
    </form>

    <script>
        function onlyAlphabets(event) {
            var key = event.keyCode;
            if (!((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 8 || key == 32)) {
                alert("Apenas letras são permitidas.");
                return false;
            }
            return true;
        }

        function onlyNumbers(event) {
            var key = event.keyCode;
            if (!(key >= 48 && key <= 57)) {
                alert("Apenas números são permitidos.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>