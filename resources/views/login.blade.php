<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Diagnosis</title>
    <style>

        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #0f4036, #2b8795);
            margin: 0;
        }

        .container {
            display: flex;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            height: 60%;
        }

        .login {
            padding: 30px;
            width: 35%;
        }

        h2 {
            margin-bottom: 20px;
            color: black;
            text-align: center;
            font-size: xx-large;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-size: 14px;
        }

        input {
            font-size: 10px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            border: none;
            background: linear-gradient(135deg, #0f4036, #2b8795);
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .illustration {
            width: 65%;
            position: relative;
        }

        .illustration img {
            width: 110%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 0 10px 10px 0;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="login">
            <h2>MEDAC</h2>
            <form action="{{ route('loginenter') }}" method="POST">
                @csrf


                <label for="email"><i class="fas fa-vial"></i>Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Email" required>


                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>


                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
        <div class="illustration">
            <img src="img/login.jpg" alt="Ilustración">
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
