
<?php
     require('../conexion.php');
     require('../person.php');
     global $stmt, $mysqli, $personObj;
     $mysqli = connection();

     if(isset($_POST["method"]) && $_POST["method"] === 'put') updateUser($_POST["data"]);

     $res = '';
  
     $stmt = $mysqli -> prepare("SELECT * FROM person WHERE id='".$_GET["id"]."'");
     $stmt -> execute();
     $result = $stmt->get_result();
     $user = $result->fetch_assoc(); 
     
     $person = new Person($user["name"], $user["surname"], $user["email"]);
     $person->setID($user["id"]); 
     $personObj = $person->getPerson();
    
         
     function updateUser($data){
        global $mysqli, $stmt;

        $id = trim($_GET["id"]);
        $name = trim($data["name"]);
        $surname = trim($data["surname"]);
        $email = $data["email"];

        $fields = "name=?, surname=?, email=?";
       

        try {
            $stmt = $mysqli -> prepare("SELECT email FROM person WHERE email=?");
            $stmt -> bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc(); 
            
            if(is_null($data)){
                $stmt = $mysqli -> prepare("UPDATE person SET $fields WHERE id=?");
                $stmt -> bind_param("ssss",$name, $surname, $email, $id);
                $status = $stmt -> execute();
                echo json_encode(array("ok"=>true, "title" => "¡Proceso exitoso!", "msg"=> "Se ha editado el usuario correctamente"));
            }else{
                echo json_encode(array("ok"=>true, "title" => "No hemos hecho nada", "msg"=> "El email ya ha sido tomado por otro usuario."));
            }

        } catch (\Throwable $th) {
            //throw $th;
            echo json_encode(array("ok"=>false, "title" => "No hemos hecho nada", "msg"=> "Oops, algo salió mal"));
        }

        exit;
    
     }



    

     $stmt -> close();
     $mysqli -> close(); 
     
   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="conferencia de codo a codo con los mejores oradores, inscribite">
    <meta name="title" content="Conferencia Codo a Codo 2022">
    <title>Lista Inscripción Conferencia BSAS Codo a Codo - tomihq</title>
    
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

    <header>
      <nav class="navbar navbar-expand-sm bg-gray">
        
        <div class="nav-container container-fluid justify-content-center">
          <div class="nav-container-top">
            <picture>
              <source  class="navbar-logo" srcset="../../img/codoacodo.webp" alt="codo a codo logo" type="image/webp">
              <img  class="navbar-logo"src="../../img/codoacodo.png" alt="codo a codo logo" type="image/png"> 
            </picture>
          
            <a class="navbar-brand" href="#"><span class="text-light">Conf Bs As</span></a>
          </div>
          
          <div class="collapse navbar-collapse justify-content" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row flex-wrap justify-content-between">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../listaInscripcion.php"> 
                  <span> <b class="text-light">Volver atrás</b> </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"> 
                  <span> <b class="text-light">La conferencia</b> </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">  <span class="text-light">Los oradores</span></a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="#"><span class="text-light"> El lugar y la fecha</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#"><span class="text-light"> Conviértete en orador</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./tickets.php"><span class="txt-green"> Comprar tickets</span></a>
              </li>

            </ul>
           
          </div>
        </div>
      </nav>
    </header>

    <main class="main-container p-4 d-flex flex-column justify-content-center align-items-center align-items-md-start ms-md-5">
        <h1>Editar Usuario</h1>

        <section class="d-flex flex-column justify-content-center">
        <form class="form-edituser">
            <div>
                <div class="form-group mt-4 col-md-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Nombre" autocomplete="off" value="<?php echo $personObj["name"] ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="surname">Apellido</label>
                    <input type="text" class="form-control input-lg" id="surname" name="surname" placeholder="Apellido" autocomplete="off" value="<?php echo $personObj["surname"] ?>">
                </div>
                <div class="form-group  mt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email" value="<?php echo $personObj["email"] ?>">
                </div>
            </div>
            
        </form>
        <button type="submit" class="btn btn-primary mt-5 saveButton" id="<?php echo $personObj["id"] ?>">Guardar</button>
        </section>
    </main>
   
    <footer
          class="text-center text-lg-start text-white mt-5"
          style="background-color: #1c2331"
          >
  


    <section class="footer">
      <div class="container-fluid mt-4  mb-4  text-center">
           <div class="container-fluid d-flex justify-content-between align-items-center p-0 text-center container-sm footer-container" >
        
            <span class="text-uppercase fw-bold">Preguntas Frecuentes</span>
            <span class="text-uppercase fw-bold">Contáctanos</span>
            <span class="text-uppercase fw-bold">Prensa</span>
            <span class="text-uppercase fw-bold">Conferencias</span>
            <span class="text-uppercase fw-bold">Términos y condiciones</span>
            <span class="text-uppercase fw-bold">Privacidad</span>
            <span class="text-uppercase fw-bold">Estudiantes</span>
            <a class="text-uppercase fw-bold text-decoration-none" href="./php/listaInscripcion.php"><strong class="text-white ">Uso Interno</strong></a>

        </div>
      </div>
   
      </div>
    </section>
  
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2022 Tomás Hernández:
      <a class="text-white" href="#"
         >Codo a Codo </a
        >
    </div>
    
  </footer>
    <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="../../js/editUser.js"></script>
    <script  type="text/javascript" src="../../js/helpers.js"></script>
  </body>
</html>