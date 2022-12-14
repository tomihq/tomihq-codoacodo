<?php
 require('./php/conexion.php');
require('./php/queries/users.php');
require('./php/queries/category.php');
require('./php/queries/tickets.php');
require('./php/queries/ticket_person.php');

if((isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["quantity"]))
){
  createTicket();
}

function createTicket(){
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = trim($_POST["email"]);
  $quantity = $_POST["quantity"];
  $category = trim($_POST["category"]) ?? 'no-category';

  $result = getUsersQuery("WHERE email=?", 'email, id', ["s", $email]);
  $user = $result->fetch_assoc(); 

  if(is_null($user)){
      //Se le asigna una contraseña temporal al usuario.
      $password = password_hash(123456, PASSWORD_DEFAULT);
      $person = array($name, $surname, $email, $password, 1);
      $uuid = createUserQuery('id, name, surname, email, password, tempPassword', '?, ?, ?, ?, ?, ?', 'sssssi', $person);  
  }else{
      $uuid = $user["id"];
     
  }

  $result = getCategories("WHERE slug=?", "slug, discount", ["s", $category]);
  $category = $result->fetch_assoc(); 

  //Si multiplico por uno es lo mismo que nada.
  $discount = 1;
  if(is_null($category)){
    echo json_encode(array("ok" => false, "title" => 'Oops', "msg" =>"La categoría no existe"));
  }else{
    $discount = $category["discount"];
  }

  //Es el unico que se va a utilizar, el de codo a codo.
  $event = 1; 
  $result = getTicket("WHERE id=?", "baseprice", ["i", $event]);
  $ticket = $result->fetch_assoc(); 

  //Por defecto le damos 200 ya que es el precio base del unico evento a manejar.
  $ticketPrice = 200; 
  if(is_null($ticketPrice)){
    echo json_encode(array("ok" => false, "title" => 'Oops', "msg" =>"El ticket no existe"));
  }else{
    $ticketPrice = $ticket["baseprice"];
  }
  $price = ($ticketPrice * intval($quantity));
  $totalDiscount = ($ticketPrice * intval($quantity)) * $discount;
  $data = array($event, $uuid, ( $price-$totalDiscount));

  $ticket_person = createTicketPerson('id, ticket, idPerson, price', '?, ?, ?, ?', 'sssd', $data);
  $ticket_person["ok"]
  ?json_encode(array("ok" => true, "title" => "Compra finalizada", "msg" => "Recuerda iniciar sesión con tu contraseña y dirigirte a la página de 'mis tickets' para poder ver tu compra."))
  :json_encode(array("ok" => false, "title" => "Error", "msg" => "Oops, hubo un problema, pero no te preocupes, lo estamos arreglando"));


  exit;
}


  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comprar Tickets</title>
    
    <?php  require("./php/UI/globalstyles.php")?>
</head>
<body>

  <?php require('./php/UI/header.php'); ?>

      <main class="main-container p-4">
        <div class="container">
          
                <div class="d-flex flex-column mb-4 col-sm-12 col-lg-12 mb-md-0 flex-md-column p-sm-4 justify-content-center  ">
                  <section class="d-flex flex-column flex-md-row row-md-12 justify-content-center gap-md-2">
                    <div class="card border border-primary mt-4">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-4"> <b class="txt-black">Estudiante </b></h5>
                          <p class="card-text mb-2">  Tienen un descuento  </p>
                          <span class="txt-black"><b>80%</b></span>
                          <div class="mt-2">
                            <span>*presentar documentacion</span>
                          </div>
                        </div>
                      </div>
    
                      <div class="card  border border-info mt-4">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-4"> <b class="txt-black">Trainee </b></h5>
                          <p class="card-text mb-2">  Tienen un descuento  </p>
                          <span class="txt-black"><b>50%</b></span>
                          <div class="mt-2">
                            <span>*presentar documentacion</span>
                          </div>
                        </div>
                      </div>
    
                      <div class="card border border-warning mt-4">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-4"> <b class="txt-black">Junior </b></h5>
                          <p class="card-text mb-2">  Tienen un descuento  </p>
                          <span class="txt-black"><b>15%</b></span>
                          <div class="mt-2">
                            <span>*presentar documentacion</span>
                          </div>
                        </div>
                      </div>
                  </section>
                  
                  <section class="d-flex flex-column flex-md-row row-md-12 justify-content-center gap-md-2 mt-4">
                    <form class="form-ticket" name="form-ticket" id="form-ticket">
                      <div><p class="txt-black text-center">VENTA</p></div>
                      <div><p class="text-center"><b class="txt-black txt-md">VALOR DE TICKET $200</b></p></div>
                      <div class="ms-3 me-3 ms-md-0 me-md-0">
                      <div class="mt-2">
                          <div class="d-flex flex-column">
                            <p>Información Personal</p>
                            <div class="form-group d-flex flex-column justify-content-between flex-md-row flex-md-wrap">
                            
                                <div class="col-12 col-md-6 p-1"> 
                                    <input type="text" class="form-control" id="clientName" aria-describedby="nameHelp" placeholder="Nombre" onkeyup="handleInputChange(this)">
                                </div>
                                <div class="col-12 col-md-6 p-1">
                                    <input type="text" class="form-control" id="clientSurname" aria-describedby="surnameHelp" placeholder="Apellido" onkeyup="handleInputChange(this)">
                                </div>
                                <div class="col-12 p-1 row-md-12 mt-2">
                                    <input type="email" class="form-control" id="clientEmail" aria-describedby="surnameHelp" placeholder="Correo" onkeyup="handleInputChange(this)" >
                                </div>
                            </div>
                          </div>
                          
                          <div class="form-group d-flex flex-column justify-content-between">
                            <div class="form-group d-flex flex-column justify-content-between flex-md-row gap-2">
                              <div class="col-12 mt-2 mb-2 col-md-6">
                                    <label for="input-quantity" >Cantidad</label>
                                    <input type="input-quantity" class="form-control" id="ticket-quantity" placeholder="Cantidad" aria-describedby="quantityHelp"/>
                              </div>
        
                              <div class="col-12 mt-2 mb-2 col-md-6">
                                <label for="input-category" >Categoria</label>
                                <select name="select-category-dropdown" id="select-category-dropdown" class="form-control">
                                    <option value="none">Seleccione una opción</option>
                                    <option value="no-category">Sin Categoria</option>
                                    <option value="student">Estudiante</option>
                                    <option value="trainee">Trainee</option>
                                    <option value="junior">Junior</option>
                                </select>
                              </div>
                              
                            </div>
                          </div>
        
                          <div class="bg-info p-2 border border-info rounded mt-4">
                            <div class="ms-2 text-white">
                                <span>Total a Pagar: $</span>
                                <span class="total-price" id="total-price"></span>
                            </div>
                          </div>
                          <section class="d-flex flex-column mt-4 p-0 flex-md-row container-buttons-end">
                                <button id="btnDelete" class="btn bg-success text-light mt-2 col-md-6">Borrar</button>
                                <button id="btnSummary" class="btn bg-success text-light mt-2 col-md-6">Resumen</button>
                          </section>

                </div>

                
                      </div>
                      </div>
                     
                    </form>
                </section>

                <section  class="d-flex flex-column flex-md-row row-md-12 justify-content-center gap-md-2 mt-4 text-center">
                  <div class="hidden" id="summary-info">
                    Gracias por su reserva <span id="name-summary"></span> <span id="surname-summary"></span>, el total a abonar es de <b>$<b id="total-summary"></b></b>
                  <p>
                    <small>Le enviaremos su factura a <b id="email-summary"></b></small>
                  </p>
                  </div>

                </section>
            </div>


        


      </main>

      <?php require('./php/UI/footer.php'); ?>
      <script src="https://kit.fontawesome.com/53b8f41532.js" crossorigin="anonymous"></script>
      <script  type="text/javascript" src="./js/main.js"></script>
      <script  type="text/javascript" src="./js/tickets.js"></script>

    
</body>
</html>