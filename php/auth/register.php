
<?php

   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="conferencia de codo a codo con los mejores oradores, inscribite">
    <meta name="title" content="Conferencia Codo a Codo 2022">
    <title>Registrarse</title>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  </head>
  <body>    

     <?php require("../UI/header.php") ?>

    <main class="main-container p-4">
    <form class="p-5">
        <div class="form-group row mb-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            <small>*Debe incluir de 8 a 20 carácteres, incluir 1 mayúscula, 1 número y 1 caractér especial.</small>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" onclick="<?php echo "Hola"?>">Registrarse</button>
            </div>
        </div>
    </form>
      
    </main>
   
    <?php
              require('../UI/footer.php');                                          
    ?>
    <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
  <!--   <script  type="text/javascript" src="../js/listaInscripcion.js"></script> -->
  </body>
</html>