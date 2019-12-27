    <?php require_once 'header.php'; ?>
    
    <main class="main container">
        <div class="register content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <label for="user-name">Nombre de usuario:</label>
                <input type="text" name="user-name" id="user-name" class="user-name">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="email">
                <label for="password-1">Contraseña:</label>
                <input type="password" name="password-1" id="password-1" class="password-1">
                <label for="password-2">Confirmar contraseña:</label>
                <input type="password" name="password-2" id="password-2" class="password-2">
                <input type="submit" value="Registrarse">
            </form>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>