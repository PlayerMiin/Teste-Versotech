<?php 
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Usuário - Visualizar</title>
  </head>
  <body>
    <?php include('navbar.php');?>

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Visualizar Usuário
                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
              <div class="card-body">
                <?php
              if (isset($_GET['id'])) {
                  $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                  $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                  $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $usuario = mysqli_fetch_array($query);
                ?>

                <div class="mb-3">
                  <label>Nome</label>
                  <p class="form-control">
                    <?=$usuario['nome'];?>
                  </p>
                 </div>

                 <div class="mb-3">
                  <label>Email</label>
                  <p class="form-control">
                    <?=$usuario['email'];?>
                  </p>
                 </div>

                 <div class="mb-3">
                  <label>Data_Nascimento</label>
                  <p class="form-control">
                    <?=date('d/m/Y', strtotime($usuario['data_nascimento']));?>
                  </p>
                 </div>
                  <div class="mb-3">
                  <label>Cor</label>
                  <p class="form-control">
                  <input type="color" name="cores" value="<?=$usuario['cores']?>">
                </p>
                 </div>
                
                 <?php
                } else {
                  echo "<h5>Usuário não encontrado</h5>";
                }
              }
              ?>
                 </div> 

                 </div>
              </div>
        </div>
       </div>
      </div>
     </div>
   </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>