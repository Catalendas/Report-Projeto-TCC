<?php
        $alertLogin = strlen($alertLogin) ? '<div class="alert">'.$alertLogin.'</div>' : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - REPPORT</title>

    <style>
        html {
            font-family: sans-serif;
            background-color: rgb(247, 247, 247);
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10rem;
            color: rgb(44, 44, 44);
        }

        h2 {
            width: 100%;
            background-color: rgb(233, 233, 233);
            padding-top: 2rem;
            padding-bottom: 2rem;
            text-align: center;
        }

        form {
            margin-top: 4rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: rgb(44, 44, 44);
        }

        .label_form, .input_form, button {
            margin-bottom: 1.5rem;
        }

        .label_form {
            font-weight: 600;
        }

        button {
            cursor: pointer;
            width: 7rem;
        }

        .input_form {
            border: none;
            background-color: rgb(233, 233, 233);
            height: 2rem;
            width: 20rem;
            border-radius: 5px;
        }

        .buttons {
            margin-top: 3rem;
            width: 15rem;
            display: flex;
            justify-content: space-between;
        }

        .button_login {
            border: 2px solid rgb(66, 66, 66);
            border-radius: 10px;
            padding: 1rem;
            background-color: rgb(247, 247, 247);
            transition: .6s;
        }

        .button_register {
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem;
            background-color: rgb(44, 44, 44);
            transition: .6s;
        }

        .button_login:hover {
            filter: opacity(75%);
        }

        .button_register:hover {
            filter: opacity(75%);
        }

        a {
            color: white;
            text-decoration: none;
        }

        .alert{
            color: red;
        }
    </style>

</head>
<body>
    <header>
        <h1>REPPORT</h1>
        <h2>LOGIN</h2>
    </header>
    <form action="" method="post">
        <label class="label_form" for="">E-mail</label>
        <input class="input_form" type="text" name="email" required>
        <label class="label_form" for="">Senha</label>
        <input class="input_form" type="text" name="senha" required>
        <?=$alertLogin?>
        <div class="buttons">
            <button class="button_register button"><a href="cadastrar.php">Cadastrar</a></button>
            <button class="button_login button" name="acao" value="logar">ENTRAR</button>
        </div>
    </form>

</body>
</html>