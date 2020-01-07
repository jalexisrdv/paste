<?php

class Pagination {

    private $elementsByPage;

    public function __construct($elementsByPage) {
        $this->elementsByPage = $elementsByPage;
    }

    public function getStartLimit($page) {
        if($page > 1) {
            $start = $page * $this->elementsByPage - $this->elementsByPage;
            return $start;
        }else {
            return 0;
        }
    }

    public function getCurrentPage($currentPage) {
        if(!empty($currentPage)) {
            $page = (int) $currentPage;
            return $page;
        }else {
            return 1;
        }
    }

    public function getTotalPages($totalPastes) {
        $totalPages = ceil($totalPastes / $this->elementsByPage);
        return $totalPages;
    }

    public function getElementsByPage() {
        return $this->elementsByPage;
    }

}