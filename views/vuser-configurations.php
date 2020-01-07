    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="configurations content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <div class="config-admin">
                    <h2>Datos de usuario: <?php echo $_SESSION['user']; ?></h2>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="email" value="<?php echo $_SESSION['email']; ?>">
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" name="password" id="password" class="password">
                    <label>Tipo de usuario: <?php echo $_SESSION['typeUser']; ?></label>
                </div>
                <input type="submit" value="Guardar cambios" class="save-changes">
            </form>

            <?php if(!empty($msjSuccess) && empty($msjError)): ?>
                <div class="success margin-top-2">
                    <p><?php echo $msjSuccess; ?></p>
                </div>
            <?php elseif(!empty($msjError)): ?>
                <div class="error margin-top-2">
                    <p><?php echo $msjError; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>