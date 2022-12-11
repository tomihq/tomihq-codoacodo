<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="conferencia de codo a codo con los mejores oradores, inscribite">
    <meta name="title" content="Conferencia Codo a Codo 2022">
    <title>Codo a Codo - tomihq</title>
    
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
    <link rel="stylesheet" href="./styles.css" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  </head>
  <body>    

    <header>
      <nav class="navbar navbar-expand-sm bg-gray">
        <div class="nav-container container-fluid justify-content-center">
          <div class="nav-container-top">
            <picture>
              <source  class="navbar-logo" srcset="./img/codoacodo.webp" alt="codo a codo logo" type="image/webp">
              <img  class="navbar-logo"src="./img/codoacodo.png" alt="codo a codo logo" type="image/png"> 
            </picture>
          
            <a class="navbar-brand" href="#"><span class="text-light">Conf Bs As</span></a>
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
                <a class="nav-link" href="./tickets.php"><span class="txt-green"> Comprar tickets</span></a>
              </li>

            </ul>
           
          </div>
        </div>
      </nav>
    </header>

    <main class="main-container">
        <div class="d-flex flex-row">
            <div class="mb-4 col col-sm mb-md-0 align-items-stretch">
              <div class="background container-banner">
                <picture>
                  <source  class="card-img-top" srcset="./img/ba1.webp" alt="codo a codo logo" type="image/webp">
                  <img  class="card-img-top" src="./img/ba1.jpg" alt="codo a codo logo" type="image/jpg"> 
                </picture>
                <div class="container-text-banner text-light">
                  
                  <div class="ms-3 mt-3 me-3 text-light gap-2">
                    <div class="d-flex flex-column justify-content-md-center justify-content-end align-items-sm-end">
                      <h1> <b class="text-center">Conf Bs As</b></h1>
                      <p class="text-right text-sm-end">  Bs As llega por primera vez a Argentina. Un evento para compartir con  nuestra comunidad el conocimiento y experiencia de los expertos que están creando el futuro de Internet. Ven a conocer a miembros del evento, a otros estudiantes de Codo a Codo y los oradores de primer nivel que tenemos para tí. Te esperamos!</p>
                      <div class="row d-flex justify-content-center">
                        <div class="mt-2 d-flex flex-column flex-sm-row justify-content-center gap-1 ">
                          <button class="mb-4 btn border-light text-light mt-2 m-lg-0">Quiero ser orador</button>
                          <button id="buyTickets" class="mb-4 btn  text-light mt-2 m-lg-0 btn-success">Comprar tickets</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
         
        </div>

       

        <section class="container mt-2 " id="speakers">
          <div><p class="txt-black text-center">CONOCÉ A LOS</p></div>
          <div><p class="text-center"><b class="txt-black txt-md">ORADORES</b></p></div>
          <div class="row justify-content-center">
            <div class="mb-4 col-sm-12 col-lg-3 mb-md-0 p-4">
              <div class="card">
               
                <picture>
                  <source  class="card-img-top" srcset="./img/steve.webp" alt="steve jobs with an iphone smiling" type="image/webp">
                  <img  class="card-img-top"src="./img/steve.jpg" alt="steve jobs with an iphone smiling" type="image/jpg" loading="lazy"> 
                </picture>

                <div class="card-body">
                  <div class="mb-1">
                    <b class="txt-black btn btn-xs btn-warning">JavaScript</b>
                    <b class="btn btn-xs btn-primary">React</b>
                  </div>
                  <h5 class="card-title"> <b class="txt-black">Steve Jobs </b></h5>
                  <p class="card-text">  Contenido de Card  </p>
                  <span class="txt-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat hic facere, aspernatur laudantium aliquid ullam distinctio quibusdam assumenda dicta sequi quidem illo a nulla fugit repellat porro beatae suscipit ea.</span>
                </div>
              </div>
            </div>
  
            <div class="mb-4 col-sm-12 col-lg-3 mb-md-0 p-4">
              <div class="card">
                <picture>
                  <source  class="card-img-top" srcset="./img/bill.webp" alt="bill gates speaking to a camera" type="image/webp">
                  <img  class="card-img-top"src="./img/bill.jpg" alt="bill gates speaking to a camera" type="image/jpg" loading="lazy"> 
                </picture>
                <div class="card-body">
                  <div class="mb-1">
                    <b class="txt-black btn btn-xs btn-warning">JavaScript</b>
                    <b class="btn btn-xs btn-primary">React</b>
                  </div>
                  <h5 class="card-title"><b class="txt-black">Bill Gates</b></h5>
                  <p class="card-text">  Contenido de Card </p>
                  <span class="txt-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat hic facere, aspernatur laudantium aliquid ullam distinctio quibusdam assumenda dicta sequi quidem illo a nulla fugit repellat porro beatae suscipit ea.</span>
                </div>
              </div>
            </div>
  
            <div class="mb-4 col-sm-12 col-lg-3 mb-md-0 p-4">
              <div class="card">
                <picture>
                  <source  class="card-img-top" srcset="./img/ada.webp" alt="ada lovelace picture" type="image/webp">
                  <img  class="card-img-top"src="./img/ada.jpeg" alt="ada lovelace picture" type="image/jpeg" loading="lazy"> 
                </picture>
                <div class="card-body">
                  <div class="mb-1">
                    <b class="btn btn-xs bg-gray text-light">Negocios</b>
                    <b class="btn btn-xs btn-danger">Startups</b>
                  </div>
                  <h5 class="card-title"> <b class="txt-black"> Ada Lovelace </b></h5>
                  <p class="card-text">  Contenido de Card </p>
                  <span class="txt-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat hic facere, aspernatur laudantium aliquid ullam distinctio quibusdam assumenda dicta sequi quidem illo a nulla fugit repellat porro beatae suscipit ea.</span>
                </div>
              </div>
            </div>
       
        </section>

        <section class="city_info container-fluid mt-4">
          <div class="row">
            <div class="col-sm-12 col-lg-5 p-0">
              <picture>
                  <source  class="img-fit-container" srcset="./img/honolulu.webp" alt="beautiful beach at honolulu" type="image/webp">
                  <img  class="img-fit-container"src="./img/honolulu.jpg" alt="beautiful beach at honolulu" type="image/jpg" loading="lazy"> 
                </picture>
            </div>
           
            <div class="col-sm-12 col-lg-7 p-0 bg-gray">
              <div class="ms-3 mt-3 me-3 text-light d- flex flex-col gap-2">
                <h1> <b>Bs As - Octubre</b></h1>
                <p>  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui accusantium excepturi ducimus perspiciatis est culpa sed quam exercitationem! Debitis repellat libero magnam explicabo ipsam earum harum ullam distinctio, rem aspernatur?</p>
                <button class="mb-4 btn border-light text-light mt-2 m-lg-0">Conocé más</button>
              </div>
            </div>

          </div>
        </section>

        <section class="be-speaker d-flex justify-content-center">
            <form id="contact-form">
              <div class="mt-4"><p class="txt-black text-center">CONVIÉRTETE EN UN</p></div>
              <div><p class="text-center"><b class="txt-black txt-md">ORADOR</b></p></div>
              <div class="ms-3 me-3 ms-md-0 me-md-0">
                <small class="">Anótate como orador para dar una <u>charla ignite.</u> Cuéntanos de qué quieres hablar!</small>
              
              <div class="mt-2">
                  <div class="d-flex flex-column">
                    <div class="form-group d-flex flex-column flex-md-row justify-content-between">
                      <div class="col-12 col-md-6 p-1"> 
                      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre"
                      onkeyup="handleInputChange(this)"
                      >
                    </div>
                    <div class="col-12 col-md-6 p-1">
                      <input type="text" class="form-control" id="surname" aria-describedby="surnameHelp" placeholder="Apellido"  
                      onkeyup="handleInputChange(this)"
                      >
                    </div>
                    </div>
                    <div class="col-12 col-md-12 p-1">
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email"
                      onkeyup="handleInputChange(this)" 
                      >
                    </div>
                  </div>
    
                  <div class="d-flex flex-column mt-1">
                    <div class="form-group d-flex flex-row justify-content-between">
                      <div class="col-12 p-1"> 
                      <textarea type="text" class="form-control" id="talkAbout" aria-describedby="text-box-what-you-want-to-talk" placeholder="¿Sobre qué quieres hablar?"></textarea>
                      <small>Recuerda incluir un título para tu charla</small>
                    </div>
                  </div>
                  <button 
                    type="button"
                    class="btn bg-success text-light mt-2"
                    id="btn-form"
                  >Enviar</button>
              </div>
              </div>
             
            </form>
        </section>
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
            <a class="text-uppercase fw-bold text-decoration-none" href="./php/auth/login.php"><strong class="text-white ">Iniciar Sesión</strong></a>
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
    <script  type="text/javascript" src="./js/main.js"></script>
    <script  type="text/javascript" src="./js/helpers.js"></script>
  </body>
</html>
