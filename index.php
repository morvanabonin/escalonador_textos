<?php 
    require_once 'classes/Escalonador.php'; 
    
    $escalonador = new Escalonador();
    echo 'chego aqui';
    $escalonador->getData();
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap-responsive.css">
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
                     <form class="form-horizontal" method="POST" action="classes/Escalonador.php" name="form">
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Texto 1</label>
                          <div class="controls">
                              <input type="text" id="texto1" class="texto1 input-xlarge" placeholder="[0-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto2">Texto 2 </label>
                          <div class="controls">
                            <input type="text" id="texto2" class="texto2 input-xlarge" placeholder="[0-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto3">Texto 3 </label>
                          <div class="controls">
                            <input type="text" id="texto3" class="texto3 input-xlarge" placeholder="[0-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Time Slice </label>
                          <div class="controls">
                              <input type="text" id="tslice" class="tslice" placeholder="[1-255]">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputTexto1">Velocidade </label>
                          <div class="controls">
                              <input type="text" id="velocidade" class="velocidade" placeholder="[1-10]">
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