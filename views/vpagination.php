        <div class="pagination container margin-top-2">
            <ul>
                <?php if($currentPage > 1): ?>
                    <li class="previus"><a href="?pagination=<?php echo ($currentPage - 1); ?> <?php if(!empty($_GET['buscar'])) echo '?buscar="' . $_GET["buscar"] . '"'?>">< Anterior</a></li>
                    <li><a href="?pagination=1 <?php if(!empty($_GET['buscar'])) echo '?buscar="' . $_GET["buscar"] . '"'?>">Primera pagina</a></li>
                <?php endif; ?>

                <?php 
                
                    for($i = $page; $i < $numberPages; $i++) {
                        if(!empty($_GET['buscar'])) {
                            if($currentPage == $i) {
                                echo "<li class='current'><a href='?pagination=$i&buscar=$search'>$i</a></li>";
                            }else {
                                echo "<li><a href='?pagination=$i&buscar=$search'>$i</a></li>";
                            }
                        }else {
                            if($currentPage == $i) {
                                echo "<li class='current'><a href='?pagination=$i&buscar=$search'>$i</a></li>";
                            }else {
                                echo "<li><a href='?pagination=$i&buscar=$search'>$i</a></li>";
                            }
                        }
                    }

                    if($currentPage == $totalPages) {
                        echo "<li class='dots'>...</li>" . "<li class='current'><a href='?pagination=$totalPages'>$totalPages</a></li>";
                    }else {
                        echo "<li class='dots'>...</li>" . "<li><a href='?pagination=$totalPages'>$totalPages</a></li>";
                    }

                ?>
                
                <?php if($currentPage < $totalPages): ?>
                    <li class="next"><a href="?pagination=<?php echo ($currentPage + 1); ?>">Siguiente ></a></li>
                <?php endif; ?>
            </ul>
        </div>