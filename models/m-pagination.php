<?php

class Pagination {

    private $pastesByPage;
    private $numberPages;

    public function __construct($pastesByPage, $numberPages) {
        $this->pastesByPage = $pastesByPage;
        $this->numberPages = $numberPages;
    }

    public function getStartLimit($page) {
        if($page > 1) {
            $start = $page * $this->pastesByPage - $this->pastesByPage;
            return $start;
        }else {
            return 0;
        }
    }

    public function getCurrentPage($currentPage) {
        if(isset($currentPage['pagina'])) {
            $page = (int) $_GET['pagina'];
            return $page;
        }else {
            return 1;
        }
    }

    public function getTotalPages($totalPastes) {
        $totalPages = ceil($totalPastes / $this->pastesByPage);
        return $totalPages;
    }

    public function getPastesByPage() {
        return $this->pastesByPage;
    }

}