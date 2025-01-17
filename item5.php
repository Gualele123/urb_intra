<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <div class="container contenedor-tabla">
    <table id="tablax" class="table table-striped table-bordered">
        <thead>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Area</th>
            <th>Contacto</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>           
                <td><div class="img-contenedor"><img src="./img/user-1.jpg" alt=""></div></td>           
                <td>Mauricio Reyes</td>           
                <td>Sistemas</td>           
                <td>78174627</td>           
            </tr>
            <tr>
                <td>2</td>           
                <td><div class="img-contenedor"><img src="./img/user-2.jpg" alt=""></div></td>           
                <td>Carla Paz</td>           
                <td>Sistemas</td>           
                <td>78174627</td>           
            </tr>
            <tr>
                <td>3</td>           
                <td><div class="img-contenedor"><img src="./img/user-3.jpg" alt=""></div></td>           
                <td>Alexander Aguirre</td>           
                <td>Sistemas</td>           
                <td>78174627</td>           
            </tr>
            <tr>
                <td>4</td>           
                <td><div class="img-contenedor"><img src="./img/user-4.jpg" alt=""></div></td>           
                <td>Juan Jose Schuacheneguer</td>           
                <td>Sistemas</td>           
                <td>78174627</td>           
            </tr>
            <tr>
                <td>5</td>           
                <td><div class="img-contenedor"><img src="./img/user-5.jpg" alt=""></div></td>           
                <td>Keyla Pedraza</td>           
                <td>Sistemas</td>           
                <td>78174627</td>           
            </tr>
        </tbody>
    </table>
    </div>


<!-- <script src="https://code/jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU" crossorigin="anonymous">
</script> -->
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
<script>
    // $(document).ready( function () {
    //     $('#tablax').DataTable();
    // } );

    let table = new DataTable('#tablax');
</script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/26de86382c.js" crossorigin="anonymous"></script>
    <script src="./main.js"></script>
</body>
</html>
