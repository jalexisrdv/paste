    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="configurations content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <div class="config-admin">
                    <h2>Datos de admin</h2>
                    <label for="admin-user">Usuario admin:</label>
                    <input type="text" name="admin-user" id="admin-user" class="admin-user">
                    <label for="password-1">Nueva contraseña:</label>
                    <input type="password" name="password-1" id="password-1" class="password-1">
                </div>

                <div class="config-site margin-top-2">
                    <h2>Datos del sitio</h2>
                    <label for="name-site">Nombre:</label>
                    <input type="text" name="name-site" id="name-site" class="name-site">
                    <label for="description-site">Descripción:</label>
                    <input type="text" name="description-site" id="description-site" class="description-site">
                </div>

                <div class="config-advertising margin-top-2">
                    <h2>Publicidad</h2>
                    <label for="up-advertising">Publicidad arriba:</label>
                    <textarea name="up-advertising" id="up-advertising" class="up-advertising"></textarea>
                    <label for="down-advertising">Publicidad abajo:</label>
                    <textarea name="down-advertising" id="down-advertising" class="down-advertising"></textarea>
                    <label for="home-advertising">Publicidad home:</label>
                    <textarea name="home-advertising" id="home-advertising" class="home-advertising"></textarea>
                </div>

                <div class="config-modules margin-top-2">
                    <h2>Módulos</h2>
                    <label for="select">Registro de usuarios:</label>
                    <div class="content-select">
                        <select name="register-users">
                            <option value="activado" selected>Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Usuarios premium:</label>
                    <div class="content-select">
                        <select name="premium-users">
                            <option value="activado" selected>Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Modo de urls:</label>
                    <div class="content-select">
                        <select name="urls-mode">
                            <option value="compatibilidad" selected>Modo Compatibilidad (?v=123 -> ?v=abc)</option>
                            <option value="alfabetico">Modo Alfabético (?v=abc)</option>
                            <option value="numerico">Modo Numérico (?v=123)</option>
                        </select>
                        <i></i>
                    </div>
                    <label for="select">Captcha en paste:</label>
                    <div class="content-select">
                        <select name="catpcha-paste">
                            <option value="activado" selected>Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>
                        <i></i>
                    </div>
                </div>

                <input type="submit" value="Guardar cambios" class="save-changes">
            </form>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>