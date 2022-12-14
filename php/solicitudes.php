
<?php
     require('conexion.php');
     require('person.php');
     require('./helpers/index.php');
     require('./queries/users.php');
     require('./queries/helpers.php');
     require('./queries/person_event.php');

     global $userFilter; 

    /*  if(!isset($_COOKIE["token"]) && !$_COOKIE["token"]){
        header('Location: /tomihq-codoacodo/');
        die();
      } */

      if(isset($_GET["email"])){
        $userFilter = $_GET["email"];
      }

     $eventsFound = getPersonDataInEvent($userFilter);
   

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
    <div class="overflow-auto"> 
        <table class="table table-striped table-hover">
        <thead>
            <th>Nombre del Evento </th>
            <th>Postulante</th>
            <th>Descripción</th>
            <th>Fecha de Postulación </th>
            <th>Hora de Postulación </th>
           
           
        </thead>
       

        <?php
          if(is_null($eventsFound->fetch_assoc())){
            ?> <h1>¡Todavía nadie se ha postulado al evento!</h1> <?php
          }
          else{
                foreach ($eventsFound as $key => $event) {
        ?>
                     <tr>
                       
                        <td>  
                            <p id="paragraph-<?php echo $event["id"] ?>">
                                <?php echo $event["name"] ?>  
                            </p>
                        </td>

                         <td class="w-25">  

                              <p id="paragraph-<?php echo $event["id"] ?>">
                              <?php echo  $event["personName"]?>  
                              </p>
                        </td>

                         <td class="w-25">  

                              <p id="paragraph-<?php echo $event["id"] ?>">
                              <?php echo  $event["description"]?>  
                              </p>
                        </td>

                        <td>  

                            <p id="paragraph-<?php echo $event["id"] ?>">
                                <?php echo  $event["inscriptionDate"]?>  
                            </p>
                        </td>
                        
                        <td class="w-25">  

                              <p id="paragraph-<?php echo $event["id"] ?>">
                              <?php echo  $event["inscriptionTime"]?>  
                              </p>
                        </td>

                       

                       
                    </tr>
                
        <?php
                                                         }
                                                        }
        ?>
      
        </table>
        </div>
    </main>
   
    <?php
              require('./UI/footer.php');                                          
    ?>

  
  </body>
</html>