<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<html>

  <?php 
  include 'Consultas.php';
  $NumeroCita = $_GET['q'];


  if(isset($_POST['btnActualizar']))
  {
      $cedula = $_POST["txt_cedula"];
      $correo = $_POST["txt_correo"];
      $fecha = $_POST["txt_fecha"];
      $hora = $_POST["txt_hora"];
      $centro = $_POST["txt_centro"];

      $respuesta = ActualizarCita($NumeroCita, $cedula, $correo, $fecha, $hora, $centro);
      
      if($respuesta == "")
      {
          
          header("location: citas.php");
      }
  }

  $cita = ConsultarCita($NumeroCita);
  if($cita == null)
  {
      header("location: index.php");
  }

  if(isset($_POST['btnCancelar']))
  {
      $codigo =   $NumeroCita;

      $respuesta = EliminarCita($codigo);
      
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
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
          <a class="btn-get-started scrollto" id="regresar" href="index2.html">Regresar al menu principal</a>
          <br><br><br>
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sistema de citas</h5>
            <form method="post" id="add_cita">

            <div class="form-floating mb-3">
                <label for="floatingInput">Numero Cita</label>
                    <input type="number" class="form-control" id="cita" name="txt_Cita" value="<?php echo $cita["NumeroCita"]?>" required readonly>
                    
              </div>


               <div class="form-floating mb-3">
                <label for="floatingInput">Cedula</label>
                    <input type="number" class="form-control" id="cedula" name="txt_cedula" value="<?php echo $cita["Cedula"]?>" required>
                    
              </div>
              <div class="form-floating mb-3">
                <label for="floatingInput">Correo Electronico</label>
                <input type="email" class="form-control" id="correo" name="txt_correo" value="<?php echo $cita["Correo"]?>" required>
                
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="txt_fecha" placeholder="2022/12/20" value="<?php echo $cita["Fecha"]?>"required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Hora</label>
                <input id="hora" class="form-control" name="txt_hora" value="<?php echo $cita["Hora"]?>" required>
              </div>

              <div class="form-floating mb-3">
                <label for="floatingInput">Centro medico</label>
                <input id="centro" name="txt_centro" class="form-control" value="<?php echo $cita["Centro"]?>" required readonly>
              </div>
              <div class="d-grid">
                <input class="btn btn-primary" type="submit" id="btnActualizar" name="btnActualizar" value="Actualizar"></input>
                <input class="btn btn-danger" type="submit" id="btnCancelar" name="btnCancelar" value="Cancelar Cita"></input>
              </div>
              <hr class="my-4">
              <br/>
            </form>
           

        
          </div>
        </div>
      </div>
    </div>
  </div>