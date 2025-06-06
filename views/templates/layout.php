<?php use Classes\UI; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Bienvenido</title>

    <style>
        /* Puedes añadir estilos personalizados aquí si es necesario */
        #map {
            height: 500px; /* Altura del mapa, ajusta según necesidad */
            width: 100%;
            background-color: #e0e0e0; /* Color de fondo mientras el mapa carga */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
        }
        #chatbot-container {
            height: 400px; /* Altura del contenedor del chatbot */
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <?php UI::includeComponent('layout/nav') ?>

    <?php echo $content ?>

    <?php UI::includeComponent('layout/footer') ?>
</body>
</html>