<?php

class Conecta{

    
        private $url = "localhost:3306";
        private $user = "root";
        private $password = "root";
        private $base = "dblivro";
    
        public function conectadb(){
            return mysqli_connect($this->url, $this->user, 
                    $this->password, $this->base);
        }
    }

?>