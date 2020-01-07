<?php require_once 'header.php'; ?>

<main class="main container">
    <div class="paste margin-top-2 box-shadow-black">
        <h3><?php echo $paste['Titulo']; ?></h3>
        <div class="radio" id="radio">
            <?php for($i = 1; $i <= 6; $i++): ?>
                <?php if(!empty($paste["Mname$i"])): ?>
                    <input type="radio" <?php if($i==1){ echo "checked";} ?> name="tab" id="tab-<?php echo $i; ?>" value="tab-<?php echo $i; ?>">
                    <label for="tab-<?php echo $i; ?>"><?php echo $paste["Mname$i"]; ?></label>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <?php for($i = 1; $i <= 6; $i++): ?>
            <?php if(!empty($paste["Mirror$i"])): ?>
                <div class="content tab-<?php echo $i; ?>">
                    <?php 
                        //Detecta urls y agrega a etiqueta
                        $text = $paste["Mirror$i"];

                        $patron = '~([a-z|A-Z]+:\/\/\S+|[a-z|A-Z|0-9|-]+\.[a-z|A-Z]+\S+)~';
                        $substitution = "<a href='$1' target='_blank'>$1</a>";
                        $result = preg_replace($patron, $substitution, $text);
                    
                        echo nl2br($result); 
                    
                    ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($_SESSION['typeUser']=='autor'): ?>
            <?php if($_SESSION['userID']==$paste['user_id']): ?>
                <a class="button" href="paste.php?u=<?php echo $idPaste; ?>">Editar</a>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($_SESSION['typeUser']=='administrador'): ?>
            <a class="button" href="paste.php?u=<?php echo $idPaste; ?>">Editar</a>
        <?php endif; ?>
    </div>
</main>

<?php require_once 'footer.php'; ?>