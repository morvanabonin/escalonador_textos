<?php

class Escalonador {
    
    public $texto1, $texto2, $texto3;
    public $velocidade;
    public $time_slice;
    
    public function getData() {
         echo 'chego aqui';
        if (!empty($_POST['form'])) {
            $this->texto1 = $_POST['texto1'];
            $this->texto2 = $_POST['texto2'];
            $this->texto3 = $_POST['texto3'];
            echo $this->texto1;
            
        }
        
    }
}
    
?>
