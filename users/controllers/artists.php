<?php

namespace Controllers;

class Artists_Controller extends Master_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo "I am the artist's index()</br>";
        $template_name= DX_ROOT_DIR . '/views/artists/index.php';

        include_once $this->layout;

    }
    public function second(){
        echo "I am the second's index()</br>";
        $template_name= DX_ROOT_DIR . '/views/artists/second.php';

        include_once $this->layout;

    }
}
?>