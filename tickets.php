<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comprar Tickets</title>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css" crossorigin>
    <link rel="stylesheet" href="./tickets.css" crossorigin>
    
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-gray">
          <div class="nav-container container-fluid justify-content-center">
            <div class="nav-container-top">
              <img src="./img/codoacodo.png" alt="codo_a_codo_img" class="navbar-logo">
              <a class="navbar-brand" href="#"><span class="text-light">Conf Bs As</span></a>
              <button id="goBack" class="mb-4 btn  text-light mt-2 m-lg-0 btn-success">Volver atrás</button>
            </div>
            
            <div class="collapse navbar-collapse justify-content" id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row flex-wrap justify-content-between">
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
                  <a class="nav-link" href="./tickets.html"><span class="txt-green"> Comprar tickets</span></a>
                </li>
  
              </ul>
             
            </div>
          </div>
        </nav>
      </header>

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

      <footer
      class="text-center text-lg-start text-white mt-5"
      style="background-color: #1c2331"
      >

<section
         class="d-flex justify-content-between p-4"
         style="background-color: #6351ce"
         >

  <div class="me-5">
    <span>Información adicional:</span>
  </div>

</section>


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

<script src="./js/tickets.js"></script>
<script  type="text/javascript" src="./js/helpers.js"></script>

</footer>


    
</body>
</html>