    <?php require_once 'header.php'; ?>
    
    <?php if(!empty($_SESSION) && ($_SESSION['typeUser']=='autor' || $_SESSION['typeUser']=='administrador' || $_SESSION['typeUser']=='vip')): ?>
        
        <?php require_once 'sidebar.php'; ?>

        <main class="main container">
            <div class="pastes content margin-top-2 box-shadow-black">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pastes as $paste): ?>
                            <tr>
                                <td><a href="?v=<?php echo $paste['pasteID']; ?>"><?php echo $paste['titulo']; ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php require_once 'pagination.php'; ?>
        </main>
    <?php endif; ?>

    <?php require_once 'footer.php'; ?>