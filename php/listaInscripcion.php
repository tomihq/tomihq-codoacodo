
<?php
     require('conexion.php');
     require('person.php');
     require('./helpers/index.php');
     require('./queries/users.php');
     require('./queries/helpers.php');

     global $personsObj;
     if(isset($_POST["id"]) && $_POST["method"]==='delete') deleteUser($_POST["id"]);

     $res = '';
  
     $persons = getUsersQuery();
     $personsObj = usersToObj($persons);
    
     function deleteUser(){
        $id = $_POST["id"];
        deleteUserQuery($id);
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

     <?php require("./UI/header.php") ?>

    <main class="main-container p-4">
        <table class="table table-striped table-hover">
        <thead>
            <th>Nombre </th>
            <th>Apellido </th>
            <th>Email</th>
            <th>Actions</th>
        </thead>
       

        <?php
                foreach ($personsObj as $key => $person) {
        ?>
                     <tr>
                       
                        <td>  
                            <p id="paragraph-<?php echo $person["id"] ?>">
                                <?php echo $person["name"] ?>  
                            </p>
                        </td>

                        <td>  

                            <p id="paragraph-<?php echo $person["id"] ?>">
                                <?php echo  $person["surname"]?>  
                            </p>
                        </td>
                        
                        <td class="w-25">  

                              <p id="paragraph-<?php echo $person["id"] ?>">
                                 <?php echo $person["email"] ?> 
                              </p>
                        </td>

                        <td> 
                            <div class="d-flex flex-column flex-md-row gap-2 gap-md-4">
                                <button class="btn btn-primary modifyUser" >
                                    <a class="text-white text-decoration-none" href="./editUser.php?id=<?php echo $person["id"] ?>"> Modificar </a>
                                </button>
                                <button class="btn btn-danger deleteUser" id="<?php echo $person["id"] ?>">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                
        <?php
                                                         }
        ?>
      
        </table>
      
    </main>
   
    <?php
              require('./UI/footer.php');                                          
    ?>
    <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
    <script  type="text/javascript" src="../js/listaInscripcion.js"></script>
  </body>
</html>