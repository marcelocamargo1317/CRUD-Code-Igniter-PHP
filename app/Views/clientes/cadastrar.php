<style>
    form {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.5);
        width: 50%;
        position: relative;
        left: 25%;

    }

    label {
        display: block;
        margin-bottom: 10px;
        padding-left: 2%;

    }

    input[type="text"],
    textarea {
        width: 96%;
        padding: 2%;
        margin-left: 2%;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;

    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 10px;
        border: none;
        width: 20%;
        border-radius: 3px;
        margin-left: 40%;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a035;
    }
</style>
</head>

<body>
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <form action="/clientes" method="post">
        <?= csrf_field() ?>

        <label for="Nome">Nome</label>
        <input type="text" name="nome" id="nome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('nome') ?>">
        <br>

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="sobrenome" onkeypress="return onlyAlphabets(event)" value="<?= set_value('sobrenome') ?>">
        <br>

        <label for="CPF">CPF</label>
        <input type="text" name="cpf" id="cpf" onkeypress="return onlyNumbers(event)" value="<?= set_value('cpf') ?>">
        <br>

        <input type="submit" name="submit" value="Cadastrar cliente">
    </form>

    <script>
        function onlyAlphabets(event) {
            var key = event.keyCode;
            return ((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 8 || key == 32);
        }

        function onlyNumbers(event) {
            var key = event.keyCode;
            return (key >= 48 && key <= 57);
        }
    </script>
</body>

</html