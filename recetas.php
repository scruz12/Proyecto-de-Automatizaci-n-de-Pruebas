<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<html>
  <?php
  include 'Consultas.php';

    if(isset($_POST['btnIngresar']))
    {
      $cedula = $_POST["txt_cedula"];
      $nombre = $_POST["nombre"];
      $apellido = $_POST["apellidos"];
      $fecha = $_POST["fecha"];
      $centro = $_POST["centro"];

      $respuesta = IngresarReceta($cedula, $nombre, $apellido, $fecha,$centro);
        
        if($respuesta == "")
        {
            header("location: recetas.php");
        }
    }




?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EDUS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- =======================================================
  * Template Name: Medilab - v4.9.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  </head>
  <style>
  body {
    background: #0000;
    background: linear-gradient(to right, #d6d8da, #33AEFF);
  }
  
  .btn-login {
    font-size: 0.9rem;
    letter-spacing: 0.05rem;
    padding: 0.75rem 1rem;
  }
  
  .btn-google {
    color: white !important;
    background-color: #ea4335;
  }
  
  .btn-facebook {
    color: white !important;
    background-color: #3b5998;
  }
</style>
<!------ Include the above in your HEAD tag ---------->
<body>



<main id="main">
    <!-- ======= Why Us Section ======= -->

  <section id="why-us" class="why-us">
 

  <div class="container">
    
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      
        <div class="card border-0 shadow rounded-3 my-5">
          
          <div class="card-body p-4 p-sm-5">
          <a class="btn-get-started scrollto" href="index2.html">Regresar al menu principal</a>
          <br><br><Br>
            
            <h5 class="card-title text-center mb-5 fw-light fs-5">Activacion de recetas</h5>
            <form method="post" id="add_cita">
               <div class="form-floating mb-3">
                <label for="floatingInput">Cedula (tal cual aparece en el comprobante)</label>
                    <input type="number" class="form-control" id="cedula" name="txt_cedula" placeholder="1-1111-2222" required>
                    
              </div>
              <div class="form-floating mb-3">
                <label for="floatingInput">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                
              </div>

              <div class="form-floating mb-3">
              <label for="floatingInput">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Fecha que aparece en el comprobante</label>
                <input type="text"  class="form-control" id="fecha" name="fecha" required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Centro medico a retirar</label>
                <select name="centro" id="centro">
                      <option value="EBAIS">EBAIS</option>
                      <option value="HOSPITAL">HOSPITAL</option>
                      <option value="CLINICA">CLINICA</option>
                </select>
              </div>
              <div class="d-grid">
                <input class="btn btn-primary" type="submit" id="btnIngresar" name="btnIngresar" value="Guardar"></input>
              </div>
              <hr class="my-4">
              <br/>
            </form>
           

        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<div class="card border-0  shadow rounded-3 my-5">
<div class="container">

  <table id="tablaRecetas" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Numero Receta</th>
        <th>Cedula Asegurado</th>
        <th>Fecha</th>
        <th>Centro Medico</th>
      </tr>
    </thead>
    <tbody id="BodyRecetas">

    </tbody>
  </table>
</div>
</div>
</body>
</html>
<script>

        //onload = Mostrar("Eduardo");
        $(document).ready(function() {

$.ajax({
    type: "POST",
    url: "Consultas.php",
    data: {
        "ConsultarRecetas2": "ConsultarRecetas2"
    },
    success: function(response) {
        $("#BodyRecetas").html(response);
    },
    error: function(err) {
        alert("Se presentó un error al consulta los datos");
    },
});
});

var tabla = document.getElementById("tablaRecetas");

  
  </script>