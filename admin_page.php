<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:index.php');
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina Admin</title>
   <link rel="stylesheet" href="styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- font awesome -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> -->
    <!-- mi css -->
     <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
   <!-- <h1 class="title"> <span>admin</span> pagina de perfil</h1> -->


      <section class="contenedor">
        <section class="contenedor-intranet">
        <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? ");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?> 
            
            <!-- header -->
            <div class="seccion header-contenedor">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                      <img src="./img/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                      Clinica Urbarí
                    </a>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                          <!-- <a class="nav-link active" aria-current="page" href="#">Admin</a> -->
                          <a class="nav-link"><?= $fetch_profile['name']; ?></a>
                        </li>
                        <li class="nav-item">
                          <div class="img-contenedor">
                            <!-- <img src="./img/usuario.png" alt=""> -->
                            <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
                          </div>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown- danger" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-from-bracket"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <!-- <li><a class="dropdown-item" href="index.php">Salir</a></li> -->
                            <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                          </ul>
                        </li>


                    </ul>
                  </div>
                </nav>
            </div>

            <!-- navbar -->
             <div class="seccion navbar-contenedor navbar-dark bg-primary">
                <ul class="nav flex-column navbar-dark bg-primary">
                  <li class="nav-item ">
                    <a class="nav-link tab_btn active" href="#"><i class="fa-solid fa-house"></i> Dashboard</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link tab_btn" href="#"><i class="fa-solid fa-cake-candles"></i> Cumpleañeros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab_btn" href="#"><i class="fas fa-bullhorn"></i> Comunicados</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab_btn" href="#"><i class="fas fa-stethoscope"></i> Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab_btn" href="#"><i class="fas fa-address-book"></i> Contactos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab_btn" href="#"><i class="fas fa-folder-open"></i> Formularios</a>
                  </li>
                </ul>
             </div>

            <!-- main -->
             <main class="seccion main-contenedor">
               <!-- DASHBOARD -->
                <div class="item ">
                    <?php  include 'item1.php'; ?>
                </div>

               <!-- CUMPLEAÑEROS -->
                <div class="item">
                    <?php  include 'item2.php'; ?>
                </div>

               <!-- COMUNICADOS -->
                <div class="item">
                    <?php  include 'item3.php'; ?>
                </div>

               <!-- SERVICIOS -->
                <div class="item">
                    <?php  include 'item4.php'; ?>
                </div>

               <!-- CONTACTOS -->
                <div class="item">
                    <?php  include 'item5.php'; ?>
                </div>

               <!-- FORMULARIOS -->
                <div class="item active">
                    <?php  include 'item6.php'; ?>
                </div>
             </main>
        </section>
    </section>



   


   <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/26de86382c.js" crossorigin="anonymous"></script>
   <script src="./main.js"></script>
   
</body>
</html>