    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="new-paste content margin-top-2 box-shadow-black">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <?php if(!empty($_GET['u'])): ?>
                    <label for="title">Titulo:</label>
                    <input type="text" name="title" id="title" class="title" value="<?php echo $paste['Titulo']; ?>">
                    
                    <div class="radio" id="radio">
                        <input checked type="radio" name="tab" id="tab-1" value="Pestaña 1">
                        <label for="tab-1"><?php echo (!empty($paste['Mname1'])) ? $paste['Mname1'] : 'Pestaña 1'; ?></label>
                        <input type="radio" name="tab" id="tab-2" value="Pestaña 2">
                        <label for="tab-2"><?php echo (!empty($paste['Mname2'])) ? $paste['Mname2'] : 'Pestaña 2'; ?></label>
                        <input type="radio" name="tab" id="tab-3" value="Pestaña 3">
                        <label for="tab-3"><?php echo (!empty($paste['Mname3'])) ? $paste['Mname3'] : 'Pestaña 3'; ?></label>
                        <input type="radio" name="tab" id="tab-4" value="Pestaña 4">
                        <label for="tab-4"><?php echo (!empty($paste['Mname4'])) ? $paste['Mname4'] : 'Pestaña 4'; ?></label>
                        <input type="radio" name="tab" id="tab-5" value="Pestaña 5">
                        <label for="tab-5"><?php echo (!empty($paste['Mname5'])) ? $paste['Mname5'] : 'Pestaña 5'; ?></label>
                        <input type="radio" name="tab" id="tab-6" value="Pestaña 7">
                        <label for="tab-6"><?php echo (!empty($paste['Mname6'])) ? $paste['Mname6'] : 'Pestaña 6'; ?></label>
                    </div>

                    <div class="paste field-tab" id="field-tab">
                        <div class="content tab-1">
                            <label for="title-tab-1">Pestaña 1:</label>
                            <input type="text" name="title-tab-1" class="title-tab" id="title-tab-1" value="<?php echo (!empty($paste['Mname1'])) ? $paste['Mname1'] : ''; ?>">
                            <textarea name="content-tab-1" class="content-tab" id="content-tab-1"><?php echo $paste['Mirror1']; ?></textarea>
                        </div>
                        <div class="content tab-2">
                            <label for="title-tab-2">Pestaña 2:</label>
                            <input type="text" name="title-tab-2" class="title-tab" id="title-tab-2" value="<?php echo (!empty($paste['Mname2'])) ? $paste['Mname2'] : ''; ?>">
                            <textarea name="content-tab-2" class="content-tab" id="content-tab-2"><?php echo $paste['Mirror2']; ?></textarea>
                        </div>
                        <div class="content tab-3">
                            <label for="title-tab-3">Pestaña 3:</label>
                            <input type="text" name="title-tab-3" class="title-tab" id="title-tab-3" value="<?php echo (!empty($paste['Mname3'])) ? $paste['Mname3'] : ''; ?>">
                            <textarea name="content-tab-3" class="content-tab" id="content-tab-3"><?php echo $paste['Mirror3']; ?></textarea>
                        </div>
                        <div class="content tab-4">
                            <label for="title-tab-4">Pestaña 4:</label>
                            <input type="text" name="title-tab-4" class="title-tab" id="title-tab-4" value="<?php echo (!empty($paste['Mname4'])) ? $paste['Mname4'] : ''; ?>">
                            <textarea name="content-tab-4" class="content-tab" id="content-tab-4"><?php echo $paste['Mirror4']; ?></textarea>
                        </div>
                        <div class="content tab-5">
                            <label for="title-tab-5">Pestaña 5:</label>
                            <input type="text" name="title-tab-5" class="title-tab" id="title-tab-5" value="<?php echo (!empty($paste['Mname5'])) ? $paste['Mname5'] : ''; ?>">
                            <textarea name="content-tab-5" class="content-tab" id="content-tab-5"><?php echo $paste['Mirror5']; ?></textarea>
                        </div>
                        <div class="content tab-6">
                            <label for="title-tab-6">Pestaña 6:</label>
                            <input type="text" name="title-tab-6" class="title-tab" id="title-tab-6" value="<?php echo (!empty($paste['Mname6'])) ? $paste['Mname6'] : ''; ?>">
                            <textarea name="content-tab-6" class="content-tab" id="content-tab-6"><?php echo $paste['Mirror6']; ?></textarea>
                        </div>
                    </div>

                    <!--<div class="type-paste">
                        <label for="select">Tipo:</label>
                        <div class="content-select">
                            <select name="type-paste" id="select">
                                <option value="publico" selected>Público</option>
                                <option value="vip">Vip</option>
                            </select>
                            <i></i>
                        </div>
                    </div>-->

                    <input type="submit" value="Aplicar Cambios" class="create-new" id="create-new">
                <?php else: ?><!-- ------CAMPOS PARA EL NUEVO PASTE------ -->
                    <label for="title">Titulo:</label>
                    <input type="text" name="title" id="title" class="title">
                    
                    <div class="radio" id="radio">
                        <input checked type="radio" name="tab" id="tab-1" value="Pestaña 1">
                        <label for="tab-1">Pestaña 1</label>
                        <input type="radio" name="tab" id="tab-2" value="Pestaña 2">
                        <label for="tab-2">Pestaña 2</label>
                        <input type="radio" name="tab" id="tab-3" value="Pestaña 3">
                        <label for="tab-3">Pestaña 3</label>
                        <input type="radio" name="tab" id="tab-4" value="Pestaña 4">
                        <label for="tab-4">Pestaña 4</label>
                        <input type="radio" name="tab" id="tab-5" value="Pestaña 5">
                        <label for="tab-5">Pestaña 5</label>
                        <input type="radio" name="tab" id="tab-6" value="Pestaña 7">
                        <label for="tab-6">Pestaña 6</label>
                    </div>

                    <div class="paste field-tab" id="field-tab">
                        <div class="content tab-1">
                            <label for="title-tab-1">Pestaña 1:</label>
                            <input type="text" name="title-tab-1" class="title-tab" id="title-tab-1">
                            <textarea name="content-tab-1" class="content-tab" id="content-tab-1"></textarea>
                        </div>
                        <div class="content tab-2">
                            <label for="title-tab-2">Pestaña 2:</label>
                            <input type="text" name="title-tab-2" class="title-tab" id="title-tab-2">
                            <textarea name="content-tab-2" class="content-tab" id="content-tab-2"></textarea>
                        </div>
                        <div class="content tab-3">
                            <label for="title-tab-3">Pestaña 3:</label>
                            <input type="text" name="title-tab-3" class="title-tab" id="title-tab-3">
                            <textarea name="content-tab-3" class="content-tab" id="content-tab-3"></textarea>
                        </div>
                        <div class="content tab-4">
                            <label for="title-tab-4">Pestaña 4:</label>
                            <input type="text" name="title-tab-4" class="title-tab" id="title-tab-4">
                            <textarea name="content-tab-4" class="content-tab" id="content-tab-4"></textarea>
                        </div>
                        <div class="content tab-5">
                            <label for="title-tab-5">Pestaña 5:</label>
                            <input type="text" name="title-tab-5" class="title-tab" id="title-tab-5">
                            <textarea name="content-tab-5" class="content-tab" id="content-tab-5"></textarea>
                        </div>
                        <div class="content tab-6">
                            <label for="title-tab-6">Pestaña 6:</label>
                            <input type="text" name="title-tab-6" class="title-tab" id="title-tab-6">
                            <textarea name="content-tab-6" class="content-tab" id="content-tab-6"></textarea>
                        </div>
                    </div>

                    <!--<div class="type-paste">
                        <label for="select">Tipo:</label>
                        <div class="content-select">
                            <select name="type-paste" id="select">
                                <option value="publico" selected>Público</option>
                                <option value="vip">Vip</option>
                            </select>
                            <i></i>
                        </div>
                    </div>-->

                    <input type="submit" value="Crear Nuevo" class="create-new" id="create-new">
                <?php endif; ?>
            </form>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>