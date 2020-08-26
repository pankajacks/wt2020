<?php

class Product {
    
    private $data = ["P1","P2","P3"];

    function getData() {
        return $this->data;
    }

    function getDataAt(int $index) {
        if ( $index <= sizeof($this->data)) {
            return $this->data[$index-1];
        }
        return null;
    }

}

/**
 * MVC
 * 
 * M: Model
 * V: View
 * C: Controller
 */

?>