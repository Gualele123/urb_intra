<?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? ");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?> 
<div class='dashboard-contenido'>
    <div class="contenido">
        <h2>Intranet Clinica Urbari</h2>
        <p>Tu Portal de informacion y recursos</p>
        <a class="nav-link active">Bienvenido <?= $fetch_profile['name']; ?></a>
    </div>
</div>