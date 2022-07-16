<?php require_once "validador_acesso.php"; 
  $arq = fopen('arq.txt', 'r');
  $chamados = [];
  $count = 0;
  while(!feof($arq)) {
    $chamados[] = fgets($arq) . '<br>';
  }
  fclose($arq);
  
  
  $aux = [];
  foreach($chamados as $idx => $value) if(str_word_count($value) === 1 && strlen($value) < 7) array_push($aux, $idx);
  foreach ($aux as $i => $v) array_splice($chamados, $i > 0 ? $v-1 : $v, 1);

  array_pop($chamados);
  $chamados = array_chunk($chamados, 4);

  if($_SESSION['perfil_id'] == 2) {
    $aux = [];
    foreach ($chamados as $key => $val) if((int) $val[0] != $_SESSION['id']) array_push($aux, $key);
    foreach ($aux as $i => $v) array_splice($chamados, $i > 0 ? $v-1 : $v, 1);
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="logoff.php" class="nav-link">Sair</a></li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php
                foreach($chamados as $val) { 
                  //if($_SESSION['perfil_id'] == 2 && $_SESSION['id'] != (int) $val[0]) continue;
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $val[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $val[2] ?></h6>
                  <p class="card-text"><?= $val[3] ?></p>

                </div>
              </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>