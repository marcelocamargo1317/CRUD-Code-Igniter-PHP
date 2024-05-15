<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
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

        .message {
            text-align: center;
            margin-bottom: 20px;
            color: red;
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

        textarea {
            width: 90%;
            padding: 10px;
            margin: 0 auto 20px auto;
            display: block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #ff4c4c;
            color: white;
            padding: 15px 20px;
            border: none;
            width: 50%;
            border-radius: 5px;
            margin: 0 auto;
            display: block;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #e04444;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>

    <form action="/clientes/deletar" method="post">
        <?= csrf_field() ?>

        <label for="cpf">CPF</label>
        <textarea name="cpf" id="cpf" cols="45" rows="4"><?= set_value('cpf') ?></textarea>

        <input type="submit" name="submit" value="Deletar cliente">
    </form>
</body>

</html>