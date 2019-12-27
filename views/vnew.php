    <?php require_once 'header.php'; ?>

    <main class="main container">
        <div class="new-paste content margin-top-2 box-shadow-black">
            <form action="" method="POST">
                <label for="title">Titulo:</label>
                <input type="text" name="title" id="title" class="title">
                
                <div class="radio">
                    <input type="radio" name="tab" id="tab-1" value="tab-1">
                    <label for="tab-1">Pestaña 1</label>
                    <input type="radio" name="tab" id="tab-2" value="tab-2">
                    <label for="tab-2">Pestaña 2</label>
                    <input type="radio" name="tab" id="tab-3" value="tab-3">
                    <label for="tab-3">Pestaña 3</label>
                    <input type="radio" name="tab" id="tab-4" value="tab-4">
                    <label for="tab-4">Pestaña 4</label>
                    <input type="radio" name="tab" id="tab-5" value="tab-5">
                    <label for="tab-5">Pestaña 5</label>
                    <input type="radio" name="tab" id="tab-6" value="tab-6">
                    <label for="tab-6">Pestaña 6</label>
                </div>

                <div class="field-tab" id="field-tab">
                    <div class="content active">
                        <label for="title-tab-1">Pestaña 1:</label>
                        <input type="text" name="title-tab-1" id="title-tab-1">
                        <textarea name="content-tab-1" id="content-tab-1"></textarea>
                    </div>
                    <div class="content">
                        <label for="title-tab-2">Pestaña 2:</label>
                        <input type="text" name="title-tab-2" id="title-tab-2">
                        <textarea name="content-tab-2" id="content-tab-2"></textarea>
                    </div>
                    <div class="content">
                        <label for="title-tab-3">Pestaña 3:</label>
                        <input type="text" name="title-tab-3" id="title-tab-3">
                        <textarea name="content-tab-3" id="content-tab-3"></textarea>
                    </div>
                    <div class="content">
                        <label for="title-tab-4">Pestaña 4:</label>
                        <input type="text" name="title-tab-4" id="title-tab-4">
                        <textarea name="content-tab-4" id="content-tab-4"></textarea>
                    </div>
                    <div class="content">
                        <label for="title-tab-5">Pestaña 5:</label>
                        <input type="text" name="title-tab-5" id="title-tab-5">
                        <textarea name="content-tab-5" id="content-tab-5"></textarea>
                    </div>
                    <div class="content">
                        <label for="title-tab-6">Pestaña 6:</label>
                        <input type="text" name="title-tab-6" id="title-tab-6">
                        <textarea name="content-tab-6" id="content-tab-6"></textarea>
                    </div>
                </div>

                <div class="type-paste">
                    <label for="select">Tipo:</label>
                    <div class="content-select">
                        <select name="type-paste" id="select">
                            <option value="publico" selected>Público</option>
                            <option value="vip">Vip</option>
                        </select>
                        <i></i>
                    </div>
                </div>

                <input type="submit" value="Crear Nuevo" class="create-new">
            </form>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>