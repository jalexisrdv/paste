<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/normalize.css">
    <title>
        <?php 

            $nameSite = $configurations['site-dates']['name-site'];
            $descriptionSite = $configurations['site-dates']['description-site'];

            if(!empty($nameSite) && !empty($descriptionSite)) {
                echo $nameSite . ' - ' . $descriptionSite; 
            }
        ?>
    </title>
</head>
<body>
    <header class="header container">
        <div class="banner">
            <img src="" alt="">
        </div>
        <nav class="navegation box-shadow-black margin-top-2">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php if(!empty($_SESSION)): ?>
                    <?php if($_SESSION['typeUser']=='administrador'): ?>
                        <li><a href="nuevo.php">Nuevo</a></li>
                        <li><a href="#">Reportados</a></li>
                        <li><a href="pastes.php">Pastes</a></li>
                        <li><a href="usuarios.php">Usuarios</a></li>
                    <?php elseif($_SESSION['typeUser']=='autor'): ?>
                        <li><a href="nuevo.php">Nuevo</a></li>
                        <li><a href="pastes.php">Pastes</a></li>
                    <?php endif; ?>
                    <li><a href="configuraciones.php">Configuraciones</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Iniciar sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>