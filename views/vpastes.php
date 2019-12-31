    <?php require_once 'header.php'; ?>
    <?php require_once 'sidebar.php'; ?>

    <main class="main container">
        <div class="pastes content margin-top-2 box-shadow-black">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pastes as $paste): ?>
                        <tr>
                            <td><a href="./?v=<?php echo $paste['pasteID']; ?>"><?php echo $paste['Titulo']; ?></a></td>
                            <td><a href="?u=<?php echo $paste['pasteID']; ?>">Editar</a></td>
                            <td><a href="?d=<?php echo $paste['pasteID']; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>

        <?php //require_once 'pagination.php'; ?>
    </main>
    
    <?php require_once 'footer.php'; ?>