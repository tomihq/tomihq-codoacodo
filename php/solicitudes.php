
<?php
     require('conexion.php');
     require('person.php');
     require('./helpers/index.php');
     require('./queries/users.php');
     require('./queries/helpers.php');
     require('./queries/person_event.php');

     if(!isset($_COOKIE["token"]) && !$_COOKIE["token"]){
        header('Location: /tomihq-codoacodo/');
        die();
      }

     $data = getPersonDataInEvent('hernandeztomas584@gmail.com');
     var_dump($data);

   

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
    
    <?php  require("./UI/globalstyles.php")?>
    
  </head>
  <body>    

     <?php require("./UI/header.php") ?>

    <main class="main-container p-4">
        <table class="table table-striped table-hover">
        <thead>
            <th>Nombre del Evento </th>
            <th>Fecha de Postulación </th>
            <th>Hora de Postulación </th>
           
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
    <script  type="text/javascript" src="../js/misSolicitudes.js"></script>
  </body>
</html>