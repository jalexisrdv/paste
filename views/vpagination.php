<?php if($totalPages > 1): ?>

    <div class="pagination container margin-top-2">
        <ul>
            <?php if($currentPage > 1): ?>
                <li class="previus"><a href="?pagina=<?php echo ($currentPage - 1); ?><?php if(!empty($search)) echo '&buscar=' . $search; ?>">< Anterior</a></li>
            <?php endif; ?>
            
            <?php if($currentPage < $totalPages): ?>
                <li class="next"><a href="?pagina=<?php echo ($currentPage + 1); ?><?php if(!empty($search)) echo '&buscar=' . $search; ?>">Siguiente ></a></li>
            <?php endif; ?>
        </ul>
    </div>

<?php else: ?>

    <?php if($currentPage > 1): ?>
        <div class="pagination container margin-top-2">
            <ul>
                <li class="previus"><a href="?pagina=<?php echo ($currentPage - 1); ?><?php if(!empty($search)) echo '&buscar=' . $search; ?>">< Anterior</a></li>
            </ul>
        </div>
    <?php endif; ?>

<?php endif; ?>