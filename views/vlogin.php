    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="login content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <label for="user-name">Nombre de usuario:</label>
                <input type="text" name="user-name" id="user-name" class="user-name">
                <label for="user-password">Contraseña:</label>
                <input type="password" name="user-password" id="user-password" class="user-password">
                <div class="container-recover-password">
                    <a href="recover-password.html">Recuperar contraseña</a>
                </div>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>