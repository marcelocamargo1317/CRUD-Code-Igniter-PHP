<title>Excluir Cliente</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 50%;
        max-width: 600px;
    }

    .container h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .container p {
        font-size: 18px;
        color: #666;
        margin-bottom: 20px;
    }

    .home {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
    }

    .home svg {
        margin-right: 8px;
    }

    .home:hover {
        background-color: #45a035;
    }
</style>
</head>

<body>
    <div class="container">
        <h1>Exclusão de Cliente</h1>
        <p>Exclusão cadastral de cliente com o CPF <?= esc($cpf) ?> realizada com sucesso!</p>
        <a href="/" class="home">
            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="#fff" d="M12 2.69l7 6V20a2 2 0 01-2 2h-3v-7H9v7H6a2 2 0 01-2-2v-11l7-6z" />
            </svg>
            Voltar </a>
    </div>
</body>

</html>