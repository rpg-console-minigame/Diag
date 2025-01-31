<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Muestra</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 40px;
            max-width: 800px;
            padding: 20px;
            box-sizing: border-box;
        }

        .muestra {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .muestra:hover {
            transform: translateY(-10px);
        }

        .muestra img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .btn {
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        .btn:hover {
            transition: 20s ease;
            background-color: #333;
            color: #fff;
        }
    </style>
</head> 
<body>
    <div class="contenedor">
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
        <div class="muestra">
            <img src="/img/piramide.png" alt="Imagen de una pirámide">
            <div class="btn">Ver más</div>
        </div>
    </div>
</body>
</html>
