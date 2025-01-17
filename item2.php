<div class='cumpleañeros-contenido'>
    <h4>Cumpleañeros de la Semana</h4>

    <div class="cumpleañerodia">
      <div class="img-contenedor">
        <img src="./img/cumpleañero5.jpeg" alt="">
      </div>
      <div class="tarjeta">
        <img src="./img/tarjeta5.jpeg" alt="">
        <div class="contenido">
          <h1>¡Muchas felicidades a la querida LIC. PAOLA ANDREA URIBE SANTA CRUZ</h1>
          <h4>Jefe Contable Tributario!</h4>
          <p>Esperamos que haya tenido un día repleto de sonrisas, buenos deseos y todo lo que la haga feliz. 
            Le deseamos siempre lo mejor y recordarle que estamos muy agradecidos de tenerla como parte de nuestra 
            familia Clínica Urbarí y que esperamos seguir compartiendo éxitos juntos. </p>
        </div>
      </div>
      
    </div>

    
    <section class="carousel-contenedor">
          <!-- carrousel -->
           <div class="Carousel">
            <!-- <h2>Proximos Cumpleañeros</h2> -->
              <div class="slick-list" id="slick-list">
                <!-- boton anterior -->
                <button class="slick-arrow slick-prev" id="button-prev">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </button>

                <div class="slick-track" id="track">
                <?php 
                  $conexion = mysqli_connect('localhost','root','','user_form');

                  $sql = "SELECT id, nombre, fechaNacimiento, appaterno, apmaterno FROM empleado";
                  $result = mysqli_query($conexion,$sql);

                  
                  while ($mostrar=mysqli_fetch_array($result)) {

                  ?>
                    <div class="slick" >
                        <div class="img-contenedor">
                            <img src="./img/user-1.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                          <h1 class="card-title"><?php echo $mostrar['nombre'] . ' ' . $mostrar['appaterno'] . ' ' . $mostrar['apmaterno']  ?></h1>
                          <p>Fecha: <strong><?php echo $mostrar['fechaNacimiento']  ?></strong></p>
                          <p>Semana: 10</p>
                          <p class="card-text">Area: Contabilidad</p>
                        </div>
                    </div>
                  <?php } ?>

                  </div>

    <!-- boton siguiente -->
    <button class="slick-arrow slick-next" id="button-next">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
    </button>
    
  </div>
  </div>
  </section>

    

</div>