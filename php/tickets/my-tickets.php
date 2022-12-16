<?php
    require('../conexion.php');
    require('../queries/ticket_person.php');
     if(!isset($_SESSION) ){
        session_start();
    } 

    if(!isset($_SESSION["email"])){
        header("Location: /tomihq-codoacodo.000webhostapp.com/php/auth/login.php");
    }

    $email = trim($_SESSION["email"]);

    $ticketsFound = getTicketPersonDataByEmail('e.name, tp.price, tp.ticketQuantity, tp.dateCreated, tp.timeCreated', $email) ?? 0;

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
    
    <?php  require("../UI/globalstyles.php")?>
    
  </head>
  <body>    

     <?php require("../UI/header.php") ?>

    <main class="main-container p-4">
        <div class="overflow-auto">
        <table class="table table-striped table-hover">
            <thead>
                <th>Nombre del Evento </th>
                <th>Cantidad de tickets</th>
                <th>Monto abonado</th>
                <th>Fecha de compra</th>
                <th>Hora de la compra </th>
            
            
            </thead>
        

            <?php
                   
                    if(is_null($ticketsFound->fetch_assoc())){
                        ?> <h1>¡Todavía no compraste ningún ticket!</h1> <?php
                    }
                    else{
                    foreach ($ticketsFound as $key => $ticket) {
            ?>
                        <tr>
                        
                            <td>  
                                <p id="paragraph-<?php echo $ticket["name"] ?>">
                                    <?php echo $ticket["name"] ?>  
                                </p>
                            </td>

                            <td class="w-25">  
                                <p id="paragraph-<?php echo $ticket["ticketQuantity"] ?>">
                                <?php echo $ticket["ticketQuantity"]?>  
                                </p>
                            </td>

                            <td class="w-25">  

                                <p id="paragraph-<?php echo $ticket["price"] ?>">
                                <?php echo  '$' .$ticket["price"]?>  
                                </p>
                            </td>

                        
                            <td class="w-25">  

                                <p id="paragraph-<?php echo $ticket["dateCreated"] ?>">
                                <?php echo  $ticket["dateCreated"] ?>  
                                </p>
                            </td>

                            <td>  

                                <p id="paragraph-<?php echo $ticket["timeCreated"] ?>">
                                    <?php echo $ticket["timeCreated"]?>  
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
              require('../UI/footer.php');                                          
    ?>

  
  </body>
</html>