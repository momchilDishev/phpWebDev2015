<?php

namespace Controllers;

class Artists_Controller{

    public function __construct(){
        echo "I am the artist</br>";
    }

    function index(){
        echo "I am the artist's index()</br>";

        include_once DX_ROOT_DIR . '/views/artists/index.php';
    }
}
?>