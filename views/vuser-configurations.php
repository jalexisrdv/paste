    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="configurations content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <div class="config-admin">
                    <h2>Datos de usuario: NICK</h2>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="email">
                    <label for="password-1">Nueva contraseña:</label>
                    <input type="password" name="password-1" id="password-1" class="password-1">
                    <label>Tipo de usuario: Premium (30 dias restantes)</label>
                </div>
                <input type="submit" value="Guardar cambios" class="save-changes">
            </form>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>