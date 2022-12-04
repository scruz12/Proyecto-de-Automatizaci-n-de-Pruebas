<?php
include 'ConnBD.php';

if(isset($_POST["ConsultarCitas2"]))
{
    ConsultarCitas();
}

if(isset($_POST["ConsultarRecetas2"]))
{
    ConsultarRecetas();
}


//Subir imagenes

error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['subir'])) {
 
    $imagen = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./imagenes/" . $imagen;
    
    $enlace = ConectarBD();
    // Get all the submitted data from the form
    $sentencia = "INSERT INTO expediente (imagen) VALUES ('$imagen')";
 
    // Execute query
    
    $listaProductos = $enlace -> query($sentencia);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}

//


function ConsultarCitas()
{
    $enlace = ConectarBD();
    $sentencia = "CALL ConsultarCitas();";
    $listaProductos = $enlace -> query($sentencia);

    while($item = mysqli_fetch_array($listaProductos))
    {
      echo "<tr>";
      echo "<td>" . $item["NumeroCita"] . "</td>";
      echo "<td>" . $item["Cedula"] . "</td>";
      echo "<td>" . $item["Fecha"] . "</td>";
      echo "<td>" . $item["Hora"] . "</td>";
      echo "<td>" . $item["Centro"] . "</td>";
      echo '<td><a href="ModificarCita.php?q=' . $item["NumeroCita"] . '" class="btn btn-info">Actualizar</a></td>';
      echo "</tr>";
    }

    CierreBD($enlace);
}



function ConsultarRecetas()
{
    $enlace = ConectarBD();
    $sentencia = "CALL ConsultarRecetas();";
    $listaRecetas = $enlace -> query($sentencia);

    while($item = mysqli_fetch_array($listaRecetas))
    {
      echo "<tr>";
      echo "<td>" . $item["NumeroReceta"] . "</td>";
      echo "<td>" . $item["Cedula"] . "</td>";
      echo "<td>" . $item["Nombre"] . "</td>";
      echo "<td>" . $item["Apellidos"] . "</td>";
      echo "<td>" . $item["Fecha"] . "</td>";
      echo "<td>" . $item["Centro"] . "</td>";
      echo "</tr>";
    }

    CierreBD($enlace);
}


function IngresarReceta($cedula, $nombre, $apellidos, $fecha, $centro)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBD();
        $sentencia = "CALL IngresarReceta('$cedula', '$nombre', '$apellidos', '$fecha', '$centro');";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CierreBD($enlace);
    return $respuesta;
}



function IngresarCita($cedula, $correo, $fecha, $hora, $centro)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBD();
        $sentencia = "CALL IngresarCita($cedula, '$correo', '$fecha', '$hora', '$centro');";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CierreBD($enlace);
    return $respuesta;
}

function ConsultarCita($NumeroCita)
{
    $enlace = ConectarBD();
    $sentencia = "CALL ConsultarCita($NumeroCita);";
    $cita = $enlace -> query($sentencia);
    CierreBD($enlace);

    return mysqli_fetch_array($cita);
}

function ActualizarCita($NumeroCita, $cedula, $correo, $fecha, $hora, $centro)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBD();
        $sentencia = "CALL ActualizarCita($NumeroCita, $cedula, '$correo', '$fecha', '$hora', '$centro');";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CierreBD($enlace);
    return $respuesta;
}

function EliminarCita($codigo)
{
    $respuesta = "";
    
    try
    {
        $enlace = ConectarBD();
        $sentencia = "CALL EliminarCita($codigo);";
        $enlace -> query($sentencia);
    }
    catch(Exception $ex)
    {
        $respuesta = $ex -> getMessage();
    }

    CierreBD($enlace);
    return $respuesta;
}

?>