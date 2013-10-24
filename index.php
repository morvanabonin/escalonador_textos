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
                            <input type="text" name="texto2" id="texto2" class="input-xlarge" placeholder="[0-255]">
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
                    <?php echo $this->showData(); ?>
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

        $processos = array( 0 => $arrayTexto1,
                        1 => $arrayTexto2,
                        2 => $arrayTexto3,
                      );           
        
        $retorno = $this->escalonator($processos, $this->velocidade, $this->time_slice);
        //echo '<pre>Processando: '. print_r ($retorno). '</pre>'
        $this->logEscalonator($retorno);
        var_dump($retorno);
    }

    public function showData() {
        return count($retorno);
    }

    //Passagem de retorno por referência para guardar a posição de acordo com a chave do array.
    private function guardaResultado($letra, $key, &$retorno) {
      foreach($retorno as $index => &$posicao) {
        if ($posicao[count($posicao)-1] == "#") {
          continue;
        }

        if ($index == $key) {
          array_push($posicao, $letra);
        }
        else {
          array_push($posicao, "*"); 
        }
      }
    }
    
    private function escalonator(&$processos, $velocidade, &$tslice) {
        $retorno = array();
        foreach ($processos as $key => $value) {
            $retorno[$key] = array();
        }

        while (count($processos) > 0) {
          foreach ($processos as $key => &$processo) {
            //var_dump($processo);
            //if ($tslice == 0) {
              //var_dump($tslice);
              //var_dump($retorno);
              //$this->logEscalonator($retorno);
              //return $retorno;
            //}

            $caracteresProcessados = 0;
            while ($caracteresProcessados < $velocidade && count($processo) > 0) {
              $letra = array_shift($processo);
              $this->guardaResultado($letra, $key, $retorno);
              $caracteresProcessados++;
            }

            if (count($processo) == 0) {
              array_push($retorno[$key], "#");
              unset($processos[$key]);
            }

            //$tslice--;
          }
        }
        return $retorno;
    }

    private function logEscalonator($retorno){

        $arquivo = 'log.txt';
        //pega o root de onde está a pasta, seja no Windows ou Linux
        $dir =  $_SERVER['DOCUMENT_ROOT'];

        //Verifica se existe a pasta 'logs', se não existe, cria com permissão 0777
        if (! dir( $dir.'logs')) {
          mkdir($dir.'logs', 0777);
        } 

        //pega o root mais a pasta criada ou já existente
        $logs = $dir.'logs/'.$arquivo;

        //verifica se o arquivo existe dentro da pasta logs, se não existe ele 
        //cria e dá permissão, além de abri-lo para a escrita.
        if(! file_exists($logs)){
          $logs = fopen($logs, 'w');
        } else {
          $logs = fopen($logs, 'w');  
        }

        //Escreve no arquivo.
        foreach ($retorno as $key => $caracteres) {
          foreach ($caracteres as $key => $caracter) {
            $escreve = fwrite($logs, $caracter);
            if ($caracter == '#') {
              $escreve = fwrite($logs, "\n"); 
            }
          }
        }
        //Fecha e salva o arquivo
        fclose($logs);
    }
}

$escalonador = new Escalonador();
$escalonador->getData();

?>
