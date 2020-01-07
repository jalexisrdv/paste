    <?php require_once 'header.php'; ?>

    <?php 
    
        if(!empty($_SESSION) && $_SESSION['typeUser']!='administrador') {
            header('Location: ./');
        }
    
    ?>

    <?php require_once 'sidebar.php'; ?>

    <main class="main container">
        <div class="pastes content margin-top-2 box-shadow-black">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['user']; ?></td>
                            <td><?php echo $user['typeUser']; ?></td>
                            <td><a href="?d=<?php echo $user['userID']; ?>">Eliminar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php require_once 'pagination.php'; ?>
    </main>
    
    <?php require_once 'footer.php'; ?>