<?php
include 'ConnBD.php';

if(isset($_POST["ConsultarCitas2"]))
{
    ConsultarCitas();
}


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