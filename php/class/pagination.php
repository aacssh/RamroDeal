<?php
class Pagination{
    private $_currentPage,
            $_perPage,
            $_totalCount;
    
    public function __construct($currentPage = '', $perPage = '', $totalCount = ''){
        $this->_currentPage = (int)$currentPage;
        $this->_perPage = (int)$perPage;
        $this->_totalCount = (int)$totalCount;
    }
    
    public function totalPage(){
        return ceil($this->_totalCount/$this->_perPage);
    }
    
    public function offset(){
        return ($this->_currentPage -1) * $this->_perPage;
    }
    
    public function previousPage(){
        return $this->_currentPage - 1;
    }
    
    public function nextPage(){
        return $this->_currentPage + 1;
    }
    
    public function hasPreviousPage(){
        return $this->_currentPage >=1 ? true : false;
    }
    
    public function hasNextPage(){
        return ($this->_currentPage <= $this->totalPage()) ? true : false;
    }
}
?>