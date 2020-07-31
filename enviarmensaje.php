<?php
    include "tools/utils.php";

    if ($_POST["nombre"] == null)
        $_POST["nombre"] = "";
    if ($_POST["correo"] == null)
        $_POST["correo"] = "";
    if ($_POST["asunto"] == null)
        $_POST["asunto"] = "";
    if ($_POST["mensaje"] == null)
        $_POST["mensaje"] = "";

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    $clientip = getUserIpAddr();
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $fecha = date("d/m/Y H:i:s");

    filter_var($nombre, FILTER_SANITIZE_STRING);
    filter_var($correo, FILTER_SANITIZE_STRING);
    filter_var($asunto, FILTER_SANITIZE_STRING);
    filter_var($mensaje, FILTER_SANITIZE_STRING);
    filter_var($clientip, FILTER_SANITIZE_STRING);
	
    $db = new PDO("mysql:host=localhost;dbname=protonpuq", "root", "");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $st = $db -> prepare("INSERT INTO mensajes VALUES (null, :nombre, :correo, :asunto, :mensaje, :clientip, :remoteip, :fecha)");

    $st->bindParam(':nombre', $nombre);
    $st->bindParam(':correo', $correo);
    $st->bindParam(':asunto', $asunto);
    $st->bindParam(':mensaje', $mensaje);
    $st->bindParam(':clientip', $clientip);
    $st->bindParam(':remoteip', $remoteip);
    $st->bindParam(':fecha', $fecha);

    $st->execute();

    $cwd = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: $cwd/mensajeenviado.php");
?>