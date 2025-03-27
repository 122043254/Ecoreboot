<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #D9D9D9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        input[type="tel"], 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #D9F5D3; 
            color: #333;
            font-size: 14px;
        }

        .btn {
            background-color: #4CAF50; 
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #3d8b40;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>EDITAR PERFIL</h2>

        <form action="guardar_perfil.php" method="POST">
            <div class="form-group">
                <label>Nombre Completo</label>
                <input type="text" name="nombre" placeholder="Juan Pérez" required>
            </div>

            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" name="telefono" placeholder="1234567890">
            </div>

            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input type="password" name="password" placeholder="Dejar en blanco si no desea cambiar">
            </div>

            <div class="form-group">
                <label>Foto de Perfil</label>
                <input type="file" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn">ACTUALIZAR</button>
        </form>
    </div>

</body>
</html>
