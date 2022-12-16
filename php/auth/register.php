
<?php
  
    require('../conexion.php');
    require('../person.php');
    require('../queries/users.php');
    require('../queries/auth.php');
    require('../helpers/index.php');

    if(isset($_POST["method"]) && $_POST["method"]==='addUser') createUser();

    function createUser(){
      $email = strtolower($_POST["email"]);
      $password = $_POST["password"];
      $confirmPassword = $_POST["confirmPassword"];

      passwordValidations($password, $confirmPassword);

      $result = getUsersQuery("WHERE email=?", 'email', ["s", $email]);
      $user = $result->fetch_assoc(); 
  
      $person = array($email, password_hash($password, PASSWORD_DEFAULT));

  
      if(is_null($user)){
          $uuid = createUserQuery('id, email, password', '?, ?, ?', 'sss', $person);   
          
          if(!is_null($uuid)) {
            $data = array("email" => $email, "password" => $password);
            $res = loginQuery($data);
            print $res?json_encode(array("token" => $res["body"]["token"], "success" => true,"title"=>"¡Atención!", "msg" => "Te has registrado satisfactoriamente.")):json_encode(array("ok" => false));

            exit;
          }
          
          
      }else{
          echo json_encode(array("success" => true,"title"=>"¡Atención!", "msg" => "El email ya se encuentra en uso."));
          exit;
      }
      exit;
  

    }

   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="conferencia de codo a codo con los mejores oradores, regístrate y obtén jugosos beneficios.">
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  </head>
  <body>    

     <?php require("../UI/header.php") ?>

    <main class="main-container p-4 bg-dark text-center" id="register-main">
      <h1 class="px-5 font-bold text-black">CODO A CODO</h1>
      <h2 class="px-5 font-weight-bold text-black mb-5">Regístrese y obtenga beneficios.</h2>
      <section class="d-flex flex-column flex-md-row px-5 p-md-5  justify-content-center align-items-center gap-4">
        <div >
            <picture>
              <source srcset="../../img/cat.webp" type="type/webp">
              <img src="../../img/cat.jpg" class="img-fluid" alt="cat with blue eyes looking the camera" width="400" height="400">
        </div>

        <form id="register-form" class="mt-2 ms-md-4 p-4 mt-md-0 text-start bg-dark  rounded">
            <h3 class="text-white mb-4 font-weight-bold">Ingrese sus datos</h3>
            <div class="form-group row mb-4 text-white">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7 d-flex justify-content-center align-items-center">
                <input type="email" class="form-control" id="email" placeholder="Email" onkeyup="handleInputChange(this)" >
                </div>
            </div>
            <div class="form-group row mb-4 text-white">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-7 d-flex flex-column gap-2 justify-content-center align-items-center">
                  <input type="password" class="form-control" id="password" placeholder="Contraseña" onkeyup="handleInputChange(this)" >
                  <small>*Debe incluir de 8 a 20 carácteres, incluir 1 mayúscula, 1 número y 1 caractér especial.</small>
                </div>
            </div>
            <div class="form-group row mb-4 text-white">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Reingrese Contraseña</label>
                <div class="col-sm-8 d-flex justify-content-center align-items-center">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmar Contraseña" onkeyup="handleInputChange(this)">
                </div>
            </div>
            
                <div class="col-sm-10 d-flex justify-content-center align-items-center mt-5 mt-md-0">
                  <button type="button" class="btn btn-primary w-50 ms-md-5" id="button-submit">Registrarse</button>
                </div>
        </form>

   
    
      </section>
      
    </main>
   
    <?php
              require('../UI/footer.php');                                          
    ?>
    <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/auth/register.js"></script> 
    <script type="text/javascript" src="../../js/helpers.js"></script> 
  </body>
</html>