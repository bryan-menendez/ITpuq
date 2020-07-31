<?php
    include "templates/header.html";

    $id = $_GET["id"];

    switch($id)
    {
        case "formateo":
            include "servicios/formateo.html";
            break;

        case "respaldo":
            include "servicios/respaldo.html";
            break;

        case "recuperacionhdd":
            include "servicios/recuperacionhdd.html";
            break;    

        default:
            include "templates/servicioexample.html";
            break;
    }
    

    include "templates/contacto.html";
    include "templates/footer.html";
?>