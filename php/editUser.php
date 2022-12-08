
<?php
     require('conexion.php');
     require('person.php');
     require('./queries/users.php');
     require('./queries/helpers.php');

     if(isset($_POST["method"]) && $_POST["method"] === 'put') updateUser($_POST["data"]);

     $result = getUsersQuery("WHERE id=?", "*", ["s", $_GET["id"]]);
     $user = $result->fetch_assoc(); 
     $personObj = userToObj($user);


     function updateUser($data){
        global $mysqli, $stmt;
        $id = trim($_GET["id"]);
        
        $name = trim($data["name"]);
        $surname = trim($data["surname"]);
        $email = $data["email"];
        $data["id"] = $id;

        updateUserQuery($data, "name=?, surname=?, email=?", ["ssss", $name, $surname, $email, $id]);
      
        exit;
    
     }

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
    <link rel="stylesheet" href="../styles.css" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  </head>
  <body>    

    <?php
        require("./UI/header.php");
    ?>

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
   
    <?php
        require("./UI/footer.php");
    ?>
    <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="../js/editUser.js"></script>
    <script  type="text/javascript" src="../js/helpers.js"></script>
  </body>
</html>