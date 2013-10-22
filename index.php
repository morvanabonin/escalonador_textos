<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="page-header align-center">
                        <h3>Escalonador de Texto</h3>
                    </div>
                </div>
                <div class="span6">
                     <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form">
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Texto 1</label>
                          <div class="controls">
                              <input type="text" name="texto1" id="texto1" class=" input-xlarge" placeholder="[0-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto2">Texto 2 </label>
                          <div class="controls">
                            <input type="text" name="texto2" id="texto2" class="input-xlarge" placeholder="[0-255]">6
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto3">Texto 3 </label>
                          <div class="controls">
                            <input type="text" name="texto3" id="texto3" class=" input-xlarge" placeholder="[0-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Time Slice </label>
                          <div class="controls">
                              <input type="text" name="tslice" id="tslice" class="tslice" placeholder="[1-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Velocidade </label>
                          <div class="controls">
                              <input type="text" name="velocidade" id="velocidade" class="velocidade" placeholder="[1-10]">
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="controls">
                            <button type="submit" class="btn btn-primary">OK</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class=" offset1 span2 well align-center">
                    <p>Time</p>
                </div>
                <div class="span2 well align-center">
                    <p>Time Slice</p>
                </div>
                <div class="span2 well align-center">
                    <p>Velocidade</p>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    
class Escalonador {
    
    public $texto1, $texto2, $texto3;
    public $velocidade;
    public $time_slice;
    
    public function getData() {
 
        if (isset($_POST['texto1'] ) ) {
            $this->texto1 = $_POST['texto1'];
            $this->texto2 = $_POST['texto2'];
            $this->texto3 = $_POST['texto3'];
            $this->velocidade = $_POST['velocidade'];
            $this->time_slice = $_POST['tslice'];
        }   
        
        $arrayTexto1 = str_split($this->texto1);
        $arrayTexto2 = str_split($this->texto2);
        $arrayTexto3 = str_split($this->texto3);
        
        $this->escalonator($arrayTexto1, $arrayTexto2, $arrayTexto3, $this->velocidade, $this->time_slice);
        
    }
    
    private function escalonator($arrayTexto1, $arrayTexto2, $arrayTexto3, $velocidade, $tslice) {
        $texto = array( 0 => $arrayTexto1,
                        1 => $arrayTexto2,
                        2 => $arrayTexto3,
                      );           
        foreach ($texto as $index => $palavras) {
          echo '<pre>'. print_r ($palavras, 1). '</pre>';  
            foreach ($palavras as $key => $letra) {
              echo '<pre>'. print_r ($letra, 1). '</pre>';  
                
            }     
        }     
    }
}

$escalonador = new Escalonador();
$escalonador->getData();

?>
