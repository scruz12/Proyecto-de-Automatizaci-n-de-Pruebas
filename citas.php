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
      $correo = $_POST["txt_correo"];
      $fecha = $_POST["txt_fecha"];
      $hora = $_POST["txt_hora"];

      $centro = $_POST["txt_centro"];

      $respuesta = IngresarCita($cedula, $correo, $fecha, $hora, $centro);
        
        if($respuesta == "")
        {
            header("location: citas.php");
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
            
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sistema de citas</h5>
            <form method="post" id="add_cita">
               <div class="form-floating mb-3">
                <label for="floatingInput">Cedula</label>
                    <input type="number" class="form-control" id="cedula" name="txt_cedula" placeholder="1-1111-2222" required>
                    
              </div>
              <div class="form-floating mb-3">
                <label for="floatingInput">Correo Electronico</label>
                <input type="email" class="form-control" id="correo" name="txt_correo" placeholder="name@example.com" required>
                
              </div>

              <div class="form-floating mb-3">
              <label for="floatingInput">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="txt_fecha" placeholder="2022/12/02" required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Hora</label>
                <input type="number" id="txt_hora" class="form-control" name="txt_hora" required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Centro medico</label>
                <input id="centro" name="txt_centro" class="form-control" required>
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

  <table id="tablaCitas" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Numero Cita</th>
        <th>Cedula Asegurado</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Centro Medico</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="BodyCitas">

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
        "ConsultarCitas2": "ConsultarCitas2"
    },
    success: function(response) {
        $("#BodyCitas").html(response);
    },
    error: function(err) {
        alert("Se presentó un error al consulta los datos");
    },
});
});

var tabla = document.getElementById("tablaCitas");

  
  </script>