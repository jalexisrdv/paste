    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="configurations content margin-top-2 box-shadow-black">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="config-admin">
                    <h2>Datos de admin: <?php echo $_SESSION['user']; ?></h2>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="email" value="<?php echo $_SESSION['email']; ?>">
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" name="password" id="password" class="password">
                </div>

                <div class="config-site margin-top-2">
                    <h2>Datos del sitio</h2>
                    <label for="name-site">Nombre:</label>
                    <input type="text" name="name-site" id="name-site" class="name-site" value="<?php echo $configurations['site-dates']['name-site']; ?>">
                    <label for="description-site">Descripción:</label>
                    <input type="text" name="description-site" id="description-site" class="description-site" value="<?php echo $configurations['site-dates']['description-site']; ?>">
                </div>

                <div class="config-advertising margin-top-2">
                    <h2>Publicidad</h2>
                    <label for="up-advertising">Publicidad arriba:</label>
                    <textarea name="up-advertising" id="up-advertising" class="up-advertising"><?php echo $configurations['advertising']['up-advertising']; ?></textarea>
                    <label for="down-advertising">Publicidad abajo:</label>
                    <textarea name="down-advertising" id="down-advertising" class="down-advertising"><?php echo $configurations['advertising']['down-advertising']; ?></textarea>
                    <label for="home-advertising">Publicidad home:</label>
                    <textarea name="home-advertising" id="home-advertising" class="home-advertising"><?php echo $configurations['advertising']['home-advertising']; ?></textarea>
                </div>

                <div class="config-modules margin-top-2">
                    <h2>Módulos</h2>
                    <label for="select">Registro de usuarios:</label>
                    <div class="content-select">
                        <select name="users-register">
                            <?php if($configurations['modules']['users-register']==1): ?>
                                <option value="1" selected>Activado</option>
                                <option value="0">Desactivado</option>
                            <?php else: ?>
                                <option value="1">Activado</option>
                                <option value="0" selected>Desactivado</option>
                            <?php endif;?>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Usuarios premium:</label>
                    <div class="content-select">
                        <select name="users-vip">
                            <?php if($configurations['modules']['users-vip']==1): ?>
                                <option value="1" selected>Activado</option>
                                <option value="0">Desactivado</option>
                            <?php else: ?>
                                <option value="1">Activado</option>
                                <option value="0" selected>Desactivado</option>
                            <?php endif; ?>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Modo de urls:</label>
                    <div class="content-select">
                        <select name="urls-mode">
                            <option value="compatibility" <?php if($configurations['modules']['urls-mode']=='compatibility') echo "selected"; ?> >Modo Compatibilidad (?v=123 -> ?v=abc)</option>
                            <option value="alphabetical" <?php if($configurations['modules']['urls-mode']=='alphabetical') echo "selected"; ?> >Modo Alfabético (?v=abc)</option>
                            <option value="numeric" <?php if($configurations['modules']['urls-mode']=='numeric') echo "selected"; ?> >Modo Numérico (?v=123)</option>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Captcha en paste:</label>
                    <div class="content-select">
                        <select name="captcha-paste">
                            <?php if($configurations['modules']['captcha-register']==1): ?>
                                <option value="1" selected>Activado</option>
                                <option value="0">Desactivado</option>
                            <?php else: ?>
                                <option value="1">Activado</option>
                                <option value="0" selected>Desactivado</option>
                            <?php endif; ?>
                        </select>
                        <i></i>
                    </div>
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