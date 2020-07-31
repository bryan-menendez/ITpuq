<?php
//webpage pieces
include "templates/header.html";
$cwd = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

//code
if ($_GET["codigo"] == null)
    $_GET["codigo"] = "";

$codigo = $_GET["codigo"];
filter_var($codigo, FILTER_SANITIZE_STRING);
$codigo = strtoupper($codigo);

$db = new PDO("mysql:host=localhost;dbname=protonpuq", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$st = $db->prepare("SELECT * FROM encargos WHERE codigo = :codigo");
$st->setFetchMode(PDO::FETCH_ASSOC);
$st->bindValue(':codigo', $codigo);
$st->execute();

$row = $st->fetch();
?>

<?php
if ($row === false || $row["estado"] == 0) {
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <!--TITULO-->
                    <h2 class="mb-3">Equipo no encontrado</h2>

                    <!--PARRAFO-1-->
                    <p>No se ha encontrado ningun encargo con dicho codigo.</p>
                    <a href="<?php print $cwd; ?>/index.php">Haga click aqui para volver al inicio.</a>
                </div>
            </div>
        </div>
    </section>

<?php
} 

else 
{
    ?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3"><?php print strtoupper($codigo);?></h2>
                <br>
                <p><b>Titulo: </b> <?php print $row["titulo"]; ?> </p>
                <p><b>Descripcion: </b> <?php print $row["descripcion"]; ?> </p>
                <p><b>Precio: </b> <?php print $row["precio"]; ?> </p>
                <p><b>Fecha inicio: </b> <?php print $row["fechaInicio"]; ?> </p>
                <p><b>Fecha termino: </b> <?php print $row["fechaTermino"]; ?> </p>
                <p><b>Estado: </b> 
                    <?php 
                        if ($row["completado"] == 1)
                            print "Completado";
                        else    
                            print "No completado";
                    ?>   
                </p>
            </div>
        </div>
    </div>
</section>

<?php
}

?>

<?php
//webpage pieces
    include "templates/buscadorequipos.html";
    include "templates/contacto.html";
    include "templates/footer.html";
?>