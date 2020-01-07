    <?php require_once 'header.php'; ?>
    <?php require_once 'sidebar.php'; ?>

    <main class="main container">
        <div class="pastes content margin-top-2 box-shadow-black">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <?php if(!empty($_SESSION) && $_SESSION['typeUser']=='administrador'): ?>
                            <th>Eliminar</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pastes as $paste): ?>
                        <tr>
                            <td><a href="./?v=<?php echo $paste['pasteID']; ?>"><?php echo $paste['titulo']; ?></a></td>
                            <td><a href="./paste.php?u=<?php echo $paste['pasteID']; ?>">Editar</a></td>
                            <?php if(!empty($_SESSION) && $_SESSION['typeUser']=='administrador'): ?>
                                <td><a href="./paste.php?d=<?php echo $paste['pasteID']; ?>">Eliminar</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>

        <?php require_once 'pagination.php'; ?>
    </main>
    
    <?php require_once 'footer.php'; ?>